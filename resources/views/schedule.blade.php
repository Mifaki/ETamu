@extends('layouts.app')

@section('title', 'Jadwal - ETamu Diskominfo')

@section('content')
    <div class="tagline text-center mt-28 md:mt-36 mb-8 md:mb-16 text-black dark:text-white">
        <h1 class="text-2xl md:text-4xl font-semibold mb-1 md:mb-2">
            Jadwal Penerimaan Tamu
        </h1>
        <p class="text-lg md:text-xl">Daftar penerimaan tamu di Pemerintah</p>
        <p class="text-lg md:text-xl">Kabupaten Tangerang</p>
    </div>

    <h3 class="text-xl md:text-2xl text-black dark:text-white mb-3">
        Keterangan Warna :
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
        @foreach($regionalDevices as $device)
            @php
                $color = app('App\Http\Controllers\ScheduleController')->getColorForRegionalDevice($device->name);
            @endphp
            <div class="flex items-center mb-2">
                <div class="w-4 h-4 {{ $color }} rounded mr-3 flex-shrink-0"></div>
                <p class="text-sm text-gray-800 dark:text-gray-100 truncate">
                    {{ $device->name }}
                </p>
            </div>
        @endforeach

        <div class="col-span-full mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center mb-2">
                <div class="w-4 h-4 bg-yellow-100 dark:bg-yellow-700 rounded mr-3"></div>
                <p class="text-sm text-gray-800 dark:text-gray-100">Hari Ini</p>
            </div>
            <div class="flex items-center mb-2">
                <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm text-gray-800 dark:text-gray-100">Klik tanggal untuk melihat semua detail jadwal</p>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-10 bg-white dark:bg-gray-800 rounded-lg shadow-lg mb-16 md:mb-36 overflow-x-auto">
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-700 min-w-[768px]">
            <a href="{{ route('schedule', ['month' => $prevMonth->month, 'year' => $prevMonth->year]) }}"
                class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <div class="text-lg font-semibold dark:text-gray-200">
                {{ $currentMonth }}
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('schedule') }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                    Hari Ini
                </a>
                <button class="px-3 py-1 text-sm bg-gray-200 text-gray-600 rounded dark:bg-gray-700 dark:text-gray-300">
                    Bulanan
                </button>
            </div>
            <a href="{{ route('schedule', ['month' => $nextMonth->month, 'year' => $nextMonth->year]) }}"
                class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-7 gap-2 p-4 text-center min-w-[768px]">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Min</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Sen</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Sel</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Rab</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Kam</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Jum</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Sab</div>

            @foreach($calendarDays as $day)
                <div class="relative min-h-[80px] p-2
                            {{ $day['is_today'] ? 'bg-yellow-100 dark:bg-yellow-700' : '' }}
                            {{ !$day['is_current_month'] ? 'text-gray-400 dark:text-gray-600' : 'dark:text-gray-200' }}
                            hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer"
                    onclick="showDayReservations({{ json_encode($day['reservations']) }}, '{{ $day['date']->format('d F Y') }}')">

                    <div class="text-sm font-medium mb-1">
                        {{ $day['date']->format('d') }}
                    </div>

                    @if($day['reservations']->count() > 0)
                        <div class="space-y-1">
                            @foreach($day['reservations']->take(2) as $reservation)
                                <div class="text-xs text-white rounded px-1 py-0.5 truncate {{ $reservation['color'] }}">
                                    {{ $reservation['time'] }} {{ $reservation['organization'] ?: $reservation['guest_name'] }}
                                </div>
                            @endforeach

                            @if($day['reservations']->count() > 2)
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    +{{ $day['reservations']->count() - 2 }} lainnya
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div id="dayModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 id="modalTitle" class="text-xl font-semibold dark:text-white"></h3>
                <button onclick="closeDayModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <div id="modalContent" class="space-y-4"></div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .calendar-event {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function showDayReservations(reservations, formattedDate) {
            document.getElementById('modalTitle').textContent = 'Jadwal ' + formattedDate;
            document.getElementById('dayModal').classList.remove('hidden');

            const modalContent = document.getElementById('modalContent');

            if (reservations.length === 0) {
                modalContent.innerHTML = '<p class="text-gray-500 dark:text-gray-400">Tidak ada jadwal pada hari ini.</p>';
            } else {
                modalContent.innerHTML = reservations.map(reservation => `
                    <div class="border rounded-lg p-4 dark:border-gray-600">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 rounded ${reservation.color}"></div>
                                <span class="font-semibold dark:text-white">${reservation.guest_name}</span>
                                <span class="px-2 py-1 text-xs rounded ${getStatusColor(reservation.status)}">
                                    ${getStatusText(reservation.status)}
                                </span>
                            </div>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                ${reservation.time} - ${reservation.time_end}
                            </span>
                        </div>
                        ${reservation.organization ? `<p class="text-sm text-gray-600 dark:text-gray-300 mb-1"><strong>Regional Device:</strong> ${reservation.organization}</p>` : ''}
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-1"><strong>Kategori:</strong> ${reservation.category}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mb-1"><strong>Tujuan:</strong> ${reservation.purpose}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300"><strong>Bidang:</strong> ${reservation.field_purpose}</p>
                    </div>
                `).join('');
            }
        }

        function closeDayModal() {
            document.getElementById('dayModal').classList.add('hidden');
        }

        function getStatusColor(status) {
            switch (status) {
                case 'pending': return 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300';
                case 'approved': return 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300';
                case 'completed': return 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300';
                case 'rejected': return 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300';
                default: return 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300';
            }
        }

        function getStatusText(status) {
            switch (status) {
                case 'pending': return 'Menunggu';
                case 'approved': return 'Disetujui';
                case 'completed': return 'Selesai';
                case 'rejected': return 'Ditolak';
                default: return status;
            }
        }

        document.getElementById('dayModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeDayModal();
            }
        });
    </script>
@endpush