@extends('layouts.dashboard')
@section('title', 'Dashboard - ETamu')
@section('content')
    <h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
        Dashboard
    </h1>

    <div id="notification-area" class="fixed top-4 right-4 z-50"></div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <div
            class="bg-gradient-to-br from-teal-400 to-teal-500 dark:from-teal-600 dark:to-teal-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105">
            <h2 class="text-xl font-semibold text-white mb-4">Jumlah Tamu</h2>
            <p id="total-guests" class="text-5xl font-bold text-white">{{ $totalGuests }}</p>
        </div>
        <div
            class="bg-gradient-to-br from-indigo-400 to-indigo-500 dark:from-indigo-600 dark:to-indigo-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105">
            <h2 class="text-xl font-semibold text-white mb-4">Kategori Tamu</h2>
            <p id="total-guest-categories" class="text-5xl font-bold text-white">{{ $totalGuestCategories }}</p>
        </div>
        <div
            class="bg-gradient-to-br from-yellow-400 to-yellow-500 dark:from-yellow-600 dark:to-yellow-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105">
            <h2 class="text-xl font-semibold text-white mb-4">Tamu Berdasarkan Keperluan</h2>
            <p id="unique-guest-purposes" class="text-5xl font-bold text-white">{{ $uniqueGuestPurposes }}</p>
        </div>
        <div
            class="bg-gradient-to-br from-green-400 to-green-500 dark:from-green-600 dark:to-green-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105">
            <h2 class="text-xl font-semibold text-white mb-4">Tamu Berdasarkan Tujuan</h2>
            <p id="unique-field-purposes" class="text-5xl font-bold text-white">{{ $uniqueFieldPurposes }}</p>
        </div>
        <div
            class="bg-gradient-to-br from-red-400 to-red-500 dark:from-red-600 dark:to-red-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105">
            <h2 class="text-xl font-semibold text-white mb-4">10 Bidang Sering Dikunjungi</h2>
            <p id="most-visited-field-count" class="text-5xl font-bold text-white">{{ $mostVisitedFieldCount }}</p>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof window.Echo === 'undefined') {
                    return;
                }

                console.log('Setting up Echo listener...');

                window.Echo.channel('dashboard-updates')
                    .subscribed(() => {
                        console.log('Successfully subscribed channel');
                    })
                    .listen('.reservation.created', (e) => { 

                        updateDashboardStats(   e.stats);

                        showNotification(e.reservation);

                        animateStatUpdate();
                    })
                    .error((error) => {
                        console.error('Echo error:', error);
                    });

                function updateDashboardStats(stats) {
                    document.getElementById('total-guests').textContent = stats.totalGuests;
                    document.getElementById('total-guest-categories').textContent = stats.totalGuestCategories;
                    document.getElementById('unique-guest-purposes').textContent = stats.uniqueGuestPurposes;
                    document.getElementById('unique-field-purposes').textContent = stats.uniqueFieldPurposes;
                    document.getElementById('most-visited-field-count').textContent = stats.mostVisitedFieldCount;
                }

                function showNotification(reservation) {
                    const notification = document.createElement('div');
                    notification.className =
                        'bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg mb-4 transform transition-all duration-300 translate-x-full';
                    notification.innerHTML = `
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium">Reservasi Baru!</p>
                                <p class="text-xs opacity-90">${reservation.guest_name} ${reservation.organization ? 'dari ' + reservation.organization : ''}</p>
                            </div>
                        </div>
                        `;

                    document.getElementById('notification-area').appendChild(notification);

                    setTimeout(() => {
                        notification.classList.remove('translate-x-full');
                    }, 100);

                    setTimeout(() => {
                        notification.classList.add('translate-x-full');
                        setTimeout(() => {
                            notification.remove();
                        }, 300);
                    }, 5000);
                }

                function animateStatUpdate() {
                    const statElements = document.querySelectorAll(
                        '[id^="total-guests"], [id^="total-guest-categories"], [id^="unique-guest-purposes"], [id^="unique-field-purposes"], [id^="most-visited-field-count"]'
                    );

                    statElements.forEach(element => {
                        element.classList.add('animate-pulse');
                        setTimeout(() => {
                            element.classList.remove('animate-pulse');
                        }, 1000);
                    });
                }
            });
        </script>
    @endpush
@endsection
