@extends('layouts.app')

@section('title', 'Check-in Berhasil - ETamu')

@section('content')
    <section class="mt-28 md:mt-36 mb-20 md:mb-36">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="bg-green-50 border border-green-200 rounded-lg p-8 text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">
                        Check-in Berhasil!
                    </h1>
                    <p class="text-green-700 mb-2">
                        Selamat datang di Pemerintah Kabupaten Tangerang
                    </p>
                    <p class="text-sm text-green-600">
                        Check-in pada: {{ $reservation->checked_in_at->format('d F Y, H:i') }} WIB
                    </p>
                </div>

                <div class="bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-6 mb-8">
                    <h2 class="text-xl font-semibold text-blue-800 dark:text-blue-200 mb-4 text-center">
                        Informasi Kunjungan Anda
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div class="text-center md:text-left">
                            <strong class="text-blue-700 dark:text-blue-300">Kode Reservasi:</strong>
                            <p class="text-xl font-mono font-bold text-blue-800 dark:text-blue-200">
                                {{ $reservation->reservation_code }}
                            </p>
                        </div>
                        <div class="text-center md:text-left">
                            <strong class="text-blue-700 dark:text-blue-300">Status:</strong>
                            <p class="text-green-600 font-semibold flex items-center justify-center md:justify-start">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Sudah Check-in
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        Detail Kunjungan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">Nama Tamu:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->guest_name }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">Organisasi:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->organization ?? '-' }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">Perangkat Daerah:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->regionalDevice->name ?? '-' }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">Bidang:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->fieldPurpose->name ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <strong class="text-gray-700 dark:text-gray-300">Waktu Pertemuan:</strong>
                            <p class="text-gray-600 dark:text-gray-400">
                                {{ $reservation->meeting_time_start?->format('d F Y, H:i') }} - 
                                {{ $reservation->meeting_time_end?->format('H:i') }} WIB
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <strong class="text-gray-700 dark:text-gray-300">Keperluan:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->guestPurpose->name ?? '-' }}</p>
                        </div>
                        @if($reservation->notes)
                        <div class="md:col-span-2">
                            <strong class="text-gray-700 dark:text-gray-300">Catatan:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-yellow-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Langkah Selanjutnya
                    </h3>
                    <ul class="text-yellow-700 space-y-2 text-sm">
                        <li class="flex items-start">
                            <span class="font-bold mr-2">1.</span>
                            <span>Silakan menuju ke <strong>{{ $reservation->regionalDevice->name ?? 'perangkat daerah tujuan' }}</strong></span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">2.</span>
                            <span>Tunjukkan kode reservasi <strong>{{ $reservation->reservation_code }}</strong> kepada petugas</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">3.</span>
                            <span>Ikuti protokol dan tata tertib yang berlaku</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">4.</span>
                            <span>Setelah selesai, Anda akan mendapat undangan untuk mengisi kuesioner penilaian</span>
                        </li>
                    </ul>
                </div>

                @if($reservation->regionalDevice && $reservation->regionalDevice->address)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Lokasi Tujuan
                    </h3>
                    <div class="text-sm text-gray-700 dark:text-gray-300">
                        <p><strong>{{ $reservation->regionalDevice->name }}</strong></p>
                        <p>{{ $reservation->regionalDevice->address }}</p>
                    </div>
                </div>
                @endif

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('reservation.show', $reservation->reservation_code) }}" 
                       class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-center transition duration-200 font-semibold">
                        Lihat Detail Lengkap
                    </a>
                    
                    <a href="{{ route('reservation.index') }}" 
                       class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 text-center transition duration-200 font-semibold">
                        Cek Reservasi Lain
                    </a>
                </div>

                <div class="bg-red-50 border border-red-200 rounded-lg p-6 mt-8">
                    <h3 class="text-lg font-semibold text-red-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Kontak Darurat
                    </h3>
                    <p class="text-red-700 text-sm">
                        Jika Anda mengalami kesulitan atau memerlukan bantuan segera, silakan hubungi:
                    </p>
                    <div class="text-sm text-red-800 mt-2">
                        <p><strong>Security/Satpam:</strong> (021) 5555-9999</p>
                        <p><strong>Informasi Umum:</strong> (021) 5555-1234</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection