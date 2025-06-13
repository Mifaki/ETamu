<?php
namespace App\Http\Controllers;

use App\Services\ReservationService;

class HomeController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        $updatedCount = $this->reservationService->updatePastReservations();

        return view('home');
    }
}
