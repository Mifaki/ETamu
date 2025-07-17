<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GuestCategory;
use App\Models\Reservation;
use App\Services\ReservationService;

class DashboardController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        $updatedCount = $this->reservationService->updatePastReservations();

        $totalGuests           = Reservation::count();
        $totalGuestCategories  = GuestCategory::count();
        $uniqueGuestPurposes   = Reservation::select('guest_purpose_id')->distinct()->count('guest_purpose_id');
        $uniqueFieldPurposes   = Reservation::select('field_purpose_id')->distinct()->count('field_purpose_id');
        $mostVisitedFieldCount = Reservation::select('field_purpose_id')
            ->groupBy('field_purpose_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->count();

        return view('dashboard.index', compact(
            'totalGuests',
            'totalGuestCategories',
            'uniqueGuestPurposes',
            'uniqueFieldPurposes',
            'mostVisitedFieldCount'
        ));
    }
}
