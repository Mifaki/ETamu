<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

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
}
