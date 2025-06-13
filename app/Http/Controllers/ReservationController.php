<?php
namespace App\Http\Controllers;

use App\Models\FieldPurpose;
use App\Models\GuestCategory;
use App\Models\GuestPurpose;
use App\Models\RegionalDevice;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        if (! Auth::check()) {
            return view('reservation.guest');
        }

        $regionalDevices = RegionalDevice::latest()->paginate(8);

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

        $reservation          = new Reservation($validated);
        $reservation->user_id = Auth::id();

        if ($request->hasFile('id_card')) {
            $reservation->id_card_path = $request->file('id_card')->store('id-cards', 'public');
        }

        if ($request->hasFile('organization_document')) {
            $reservation->organization_document_path = $request->file('organization_document')->store('organization-documents', 'public');
        }

        $reservation->save();

        return redirect()->route('reservation.show', $reservation)
            ->with('success', 'Reservasi berhasil dibuat');
    }

    public function show($id)
    {
        $reservation = Reservation::with(['user', 'guestCategory', 'guestPurpose', 'fieldPurpose'])
            ->findOrFail($id);

        if (Auth::user()->hasRole('Pengunjung') && $reservation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('reservation.show', compact('reservation'));
    }

    public function questionnaire(Reservation $reservation)
    {
        if (Auth::user()->hasRole('Pengunjung') && $reservation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('reservation.questionnaire', compact('reservation'));
    }
}
