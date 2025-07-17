<?php
namespace App\Events;

use App\Models\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservationCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $dashboardStats;

    public function __construct(Reservation $reservation, array $dashboardStats)
    {
        $this->reservation    = $reservation;
        $this->dashboardStats = $dashboardStats;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('dashboard-updates'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'reservation.created';
    }

    public function broadcastWith(): array
    {

        $data = [
            'reservation' => [
                'id'           => $this->reservation->id,
                'guest_name'   => $this->reservation->guest_name,
                'organization' => $this->reservation->organization,
                'created_at'   => $this->reservation->created_at->format('Y-m-d H:i:s'),
            ],
            'stats'       => $this->dashboardStats,
        ];

        return $data;
    }

    public function broadcastWhen(): bool
    {
        return true;
    }
}
