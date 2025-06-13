<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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

        return view('dashboard.index');
    }
}
