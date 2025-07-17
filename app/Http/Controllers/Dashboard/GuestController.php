<?php
namespace App\Http\Controllers\Dashboard;

use App\Exports\ReservationExport;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GuestController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['guestCategory', 'guestPurpose', 'fieldPurpose', 'regionalDevice'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.guest.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::with(['guestCategory', 'guestPurpose', 'fieldPurpose', 'regionalDevice', 'user'])
            ->findOrFail($id);

        return view('dashboard.guest.show', compact('reservation'));
    }

    public function approve(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'status' => 'approved',
            'notes'  => $request->input('notes', $reservation->notes),
        ]);

        return redirect()->route('dashboard.guest.index')
            ->with('success', 'Reservasi berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'notes' => 'required|string|max:1000',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'status' => 'rejected',
            'notes'  => $request->input('notes'),
        ]);

        return redirect()->route('dashboard.guest.index')
            ->with('success', 'Reservasi berhasil ditolak');
    }

    public function complete($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'status' => 'completed',
        ]);

        return redirect()->route('dashboard.guest.index')
            ->with('success', 'Reservasi berhasil diselesaikan');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('dashboard.guest.index')
            ->with('success', 'Data reservasi berhasil dihapus');
    }

    public function export(Request $request)
    {
        $request->validate([
            'month' => 'required|date_format:Y-m',
        ]);

        $month     = Carbon::createFromFormat('Y-m', $request->month);
        $monthName = $month->format('F Y');

        $filename = 'Data_Reservasi_' . $month->format('Y_m') . '.xlsx';

        return Excel::download(new ReservationExport($request->month), $filename);
    }
}
