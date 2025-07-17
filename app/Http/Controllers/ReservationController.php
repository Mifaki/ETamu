<?php
namespace App\Http\Controllers;

use App\Events\ReservationCreated;
use App\Models\FieldPurpose;
use App\Models\GuestCategory;
use App\Models\GuestPurpose;
use App\Models\Questionnaire;
use App\Models\RegionalDevice;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $regionalDevices = RegionalDevice::latest()->paginate(8);

        // For logged-in users, show their reservations
        if (Auth::check()) {
            $query = Reservation::with(['user', 'guestCategory', 'guestPurpose', 'fieldPurpose'])
                ->where('user_id', Auth::id())
                ->when($request->search, function ($query, $search) {
                    return $query->where(function ($q) use ($search) {
                        $q->where('guest_name', 'like', "%{$search}%")
                            ->orWhere('organization', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('phone_number', 'like', "%{$search}%");
                    });
                })
                ->latest();

            $reservations = $query->paginate(10)->withQueryString();

            return view('reservation.index', compact('regionalDevices', 'reservations'));
        }

        // For anonymous users, show reservation lookup form
        $reservation = null;
        if ($request->has('reservation_code') && $request->reservation_code) {
            $reservation = Reservation::with(['guestCategory', 'guestPurpose', 'fieldPurpose', 'regionalDevice'])
                ->where('reservation_code', strtoupper($request->reservation_code))
                ->first();

            if (! $reservation) {
                return back()->with('error', 'Kode reservasi tidak ditemukan.');
            }
        }

        return view('reservation.guest', compact('regionalDevices', 'reservation'));
    }

    public function create()
    {
        $guestCategories = GuestCategory::all();
        $guestPurposes   = GuestPurpose::all();
        $fieldPurposes   = FieldPurpose::all();
        $regionalDevices = RegionalDevice::all();

        return view('reservation.create', compact('guestCategories', 'guestPurposes', 'fieldPurposes', 'regionalDevices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name'            => 'required|string|max:255',
            'guest_category_id'     => 'required|exists:guest_categories,id',
            'organization'          => 'nullable|string|max:255',
            'guest_purpose_id'      => 'required|exists:guest_purposes,id',
            'phone_number'          => 'required|string|max:20',
            'email'                 => 'required|email|max:255',
            'field_purpose_id'      => 'required|exists:field_purposes,id',
            'regional_device_id'    => 'required|exists:regional_devices,id',
            'meeting_time_start'    => 'required|date_format:Y-m-d\TH:i',
            'meeting_time_end'      => 'required|date_format:Y-m-d\TH:i|after:meeting_time_start',
            'address'               => 'required|string',
            'reservation_type'      => 'required|in:individual,organization',
            'id_card'               => 'required_if:reservation_type,individual|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'organization_document' => 'required_if:reservation_type,organization|file|mimes:pdf|max:2048',
            'notes'                 => 'nullable|string',
        ]);

        $reservation = new Reservation($validated);

        if (Auth::check()) {
            $reservation->user_id = Auth::id();
        }

        if ($request->hasFile('id_card')) {
            $reservation->id_card_path = $request->file('id_card')->store('id-cards', 'public');
        }

        if ($request->hasFile('organization_document')) {
            $reservation->organization_document_path = $request->file('organization_document')->store('organization-documents', 'public');
        }

        $reservation->save();

        $dashboardStats = $this->calculateDashboardStats();

        event(new ReservationCreated($reservation, $dashboardStats));

        return redirect()->route('reservation.show', $reservation)
            ->with('success', 'Reservasi berhasil dibuat');
    }

    public function show($codeOrId)
    {
        $reservation = Reservation::with(['user', 'guestCategory', 'guestPurpose', 'fieldPurpose', 'regionalDevice'])
            ->where('reservation_code', strtoupper($codeOrId))
            ->orWhere('id', $codeOrId)
            ->firstOrFail();

        if (Auth::check() && $reservation->user_id && $reservation->user_id !== Auth::id()) {
            if (Auth::user()->hasRole('Pengunjung')) {
                abort(403);
            }
        }

        return view('reservation.show', compact('reservation'));
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'reservation_code' => 'required|string|exists:reservations,reservation_code',
        ]);

        $reservation = Reservation::with(['guestCategory', 'guestPurpose', 'fieldPurpose', 'regionalDevice'])
            ->where('reservation_code', strtoupper($request->reservation_code))
            ->firstOrFail();

        return view('reservation.show', compact('reservation'));
    }

    public function checkIn(Request $request)
    {
        $request->validate([
            'reservation_code' => 'required|string|exists:reservations,reservation_code',
        ]);

        $reservation = Reservation::where('reservation_code', strtoupper($request->reservation_code))->firstOrFail();

        if ($reservation->is_checked_in) {
            return back()->with('error', 'Anda sudah melakukan check-in untuk reservasi ini.');
        }

        if (! $reservation->canCheckIn()) {
            return back()->with('error', 'Check-in hanya dapat dilakukan maksimal 24 jam sebelum waktu pertemuan.');
        }

        if ($reservation->checkIn()) {
            return view('reservation.checkin-success', compact('reservation'));
        }

        return back()->with('error', 'Gagal melakukan check-in. Silakan coba lagi.');
    }

    public function questionnaire(Reservation $id)
    {
        if ($id->questionnaire) {
            return redirect()->route('reservation.show', $id->reservation_code)
                ->with('error', 'Anda sudah mengisi kuesioner untuk reservasi ini.');
        }

        return view('reservation.questionnaire', [
            'reservation' => $id,
        ]);
    }

    public function submitQuestionnaire(Reservation $id)
    {
        if ($id->questionnaire) {
            return redirect()->route('reservation.show', $id->reservation_code)
                ->with('error', 'Anda sudah mengisi kuesioner untuk reservasi ini.');
        }

        $validated = request()->validate([
            'service_rating'        => 'required|string',
            'facility_cleanliness'  => 'required|string',
            'facility_availability' => 'required|string',
            'feedback'              => 'required|string|max:1000',
        ]);

        $questionnaire = new Questionnaire($validated);
        $id->questionnaire()->save($questionnaire);

        return redirect()->route('reservation.show', $id->reservation_code)
            ->with('success', 'Terima kasih! Kuesioner Anda telah berhasil disimpan.');
    }

    public function cancel(Request $request, $id)
    {
        $request->validate([
            'canceled_notes' => 'required|string|max:255',
        ]);

        $reservation = Reservation::findOrFail($id);

        if (! Auth::check() || $reservation->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $now          = \Carbon\Carbon::now();
        $meetingStart = \Carbon\Carbon::parse($reservation->meeting_time_start);
        if ($now->diffInDays($meetingStart, false) === 1 && $now->isSameDay($meetingStart->copy()->subDay())) {
            return redirect()->back()->with('error', 'Pembatalan tidak dapat dilakukan sehari sebelum waktu pertemuan.');
        }

        $reservation->status         = 'canceled';
        $reservation->canceled_notes = $request->input('canceled_notes');
        $reservation->save();

        return redirect()->route('reservation.show', $reservation->id)
            ->with('success', 'Reservation has been canceled.');
    }

    private function calculateDashboardStats(): array
    {
        return [
            'totalGuests'           => Reservation::count(),
            'totalGuestCategories'  => GuestCategory::count(),
            'uniqueGuestPurposes'   => Reservation::select('guest_purpose_id')->distinct()->count('guest_purpose_id'),
            'uniqueFieldPurposes'   => Reservation::select('field_purpose_id')->distinct()->count('field_purpose_id'),
            'mostVisitedFieldCount' => Reservation::select('field_purpose_id')
                ->groupBy('field_purpose_id')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(1)
                ->count(),
        ];
    }
}
