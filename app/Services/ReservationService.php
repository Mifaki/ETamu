<?php
namespace App\Services;

use App\Models\Reservation;
use Carbon\Carbon;

class ReservationService
{
    public function updatePastReservations()
    {
        $yesterday = Carbon::yesterday();

        $updatedCount = Reservation::where('status', 'approved')
            ->whereDate('meeting_time_end', '<=', $yesterday)
            ->update(['status' => 'completed']);

        return $updatedCount;
    }
}
