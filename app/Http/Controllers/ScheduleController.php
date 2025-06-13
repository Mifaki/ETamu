<?php
namespace App\Http\Controllers;

use App\Models\RegionalDevice;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->get('month', now()->month);
        $year  = $request->get('year', now()->year);

        $reservations = Reservation::with(['guestCategory', 'guestPurpose', 'fieldPurpose'])
            ->whereYear('meeting_time_start', $year)
            ->whereMonth('meeting_time_start', $month)
            ->where('status', '!=', 'rejected')
            ->get();

        $regionalDevices = RegionalDevice::all();

        $reservationsByDate = $reservations->groupBy(function ($reservation) {
            return $reservation->meeting_time_start->format('Y-m-d');
        });

        $startDate     = Carbon::create($year, $month, 1);
        $endDate       = $startDate->copy()->endOfMonth();
        $startCalendar = $startDate->copy()->startOfWeek(Carbon::SUNDAY);
        $endCalendar   = $endDate->copy()->endOfWeek(Carbon::SATURDAY);

        $calendarDays = [];
        $current      = $startCalendar->copy();

        while ($current <= $endCalendar) {
            $dateKey         = $current->format('Y-m-d');
            $dayReservations = $reservationsByDate->get($dateKey, collect());

            $calendarDays[] = [
                'date'             => $current->copy(),
                'is_current_month' => $current->month == $month,
                'is_today'         => $current->isToday(),
                'reservations'     => $dayReservations->map(function ($reservation) {

                    return [
                        'id'              => $reservation->id,
                        'guest_name'      => $reservation->guest_name,
                        'organization'    => $reservation->organization,
                        'time'            => $reservation->meeting_time_start->format('H:i'),
                        'time_end'        => $reservation->meeting_time_end->format('H:i'),
                        'category'        => $reservation->guestCategory->name,
                        'purpose'         => $reservation->guestPurpose->name,
                        'field_purpose'   => $reservation->fieldPurpose->name,
                        'color'           => $this->generateColorFromRegionalDevice($reservation->regionalDevice->name),
                        'status'          => $reservation->status,
                        'regional_device' => $reservation->regionalDevice->name,
                    ];
                }),
            ];

            $current->addDay();
        }

        return view('schedule', [
            'calendarDays'       => $calendarDays,
            'regionalDevices'    => $regionalDevices,
            'currentMonth'       => $startDate->format('F Y'),
            'currentYear'        => $year,
            'currentMonthNumber' => $month,
            'prevMonth'          => $startDate->copy()->subMonth(),
            'nextMonth'          => $startDate->copy()->addMonth(),
        ]);
    }

    private function generateColorFromRegionalDevice($regionalDeviceName)
    {
        $hash = crc32($regionalDeviceName);

        $colorOptions = [
            'bg-blue-600',    // Dark blue
            'bg-green-600',   // Dark green
            'bg-red-600',     // Dark red
            'bg-purple-600',  // Dark purple
            'bg-indigo-600',  // Dark indigo
            'bg-pink-600',    // Dark pink
            'bg-teal-600',    // Dark teal
            'bg-orange-600',  // Dark orange
            'bg-cyan-600',    // Dark cyan
            'bg-lime-600',    // Dark lime
            'bg-amber-600',   // Dark amber
            'bg-emerald-600', // Dark emerald
            'bg-violet-600',  // Dark violet
            'bg-fuchsia-600', // Dark fuchsia
            'bg-rose-600',    // Dark rose
            'bg-sky-600',     // Dark sky
            'bg-slate-600',   // Dark slate
            'bg-gray-600',    // Dark gray
            'bg-zinc-600',    // Dark zinc
            'bg-neutral-600', // Dark neutral
            'bg-stone-600',   // Dark stone
            'bg-blue-700',    // Darker blue
            'bg-green-700',   // Darker green
            'bg-red-700',     // Darker red
            'bg-purple-700',  // Darker purple
            'bg-indigo-700',  // Darker indigo
            'bg-pink-700',    // Darker pink
            'bg-teal-700',    // Darker teal
            'bg-orange-700',  // Darker orange
            'bg-cyan-700',    // Darker cyan
            'bg-emerald-700', // Darker emerald
            'bg-violet-700',  // Darker violet
            'bg-fuchsia-700', // Darker fuchsia
            'bg-rose-700',    // Darker rose
            'bg-sky-700',     // Darker sky
        ];

        return $colorOptions[abs($hash) % count($colorOptions)];
    }

    public function getColorForRegionalDevice($regionalDeviceName)
    {
        return $this->generateColorFromRegionalDevice($regionalDeviceName);
    }
}
