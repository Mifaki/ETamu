@extends('layouts.app')

@section('title', 'Reservasi OPD - ETamu')

@section('content')
    <section>
        <div class="reserasi-opd h-max mt-28 md:mt-36">
            <div class="card-opd grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-6">
                @forelse($regionalDevices as $device)
                    <div
                        class="label text-center text-black dark:text-white bg-white dark:bg-gray-500 h-auto max-w-full rounded-lg shadow-lg px-4 py-5">
                        @if ($device->logo_path)
                            <img class="w-[50%] mx-auto object-contain" src="{{ asset($device->logo_path) }}"
                                alt="{{ $device->name }}">
                        @else
                            <div class="w-[50%] mx-auto h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400">No Logo</span>
                            </div>
                        @endif
                        <p class="mt-2">{{ $device->name }}</p>
                        @if ($device->address)
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ Str::limit($device->address, 30) }}</p>
                        @endif
                        <p class="text-green-400 font-semibold">0 kunjungan</p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada perangkat daerah yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <nav aria-label="Page navigation" class="flex justify-center mt-7 md:mt-12">
                {{ $regionalDevices->links('pagination::tailwind') }}
            </nav>

            <div class="tagline text-center mt-12 md:mt-16 mb-8 md:mb-16 text-black dark:text-white">
                <h1 class="text-2xl md:text-4xl font-semibold mb-1 md:mb-2">
                    Reservasi Kunjungan
                </h1>
                <p class="text-lg md:text-xl">Buat reservasi atau cek status reservasi Anda</p>
                <p class="text-lg md:text-xl">di Pemerintah Kabupaten Tangerang</p>
            </div>

            <div class="reservation-actions mb-20 md:mb-36">
                <div class="flex justify-center mb-8">
                    <button class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 text-lg font-semibold">
                        <a href="{{ route('reservation.create') }}">+ Buat Reservasi Baru</a>
                    </button>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
                    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800 dark:text-gray-100">
                        Cek Status Reservasi
                    </h2>
                    
                    <form action="{{ route('reservation.index') }}" method="GET" class="mb-6">
                        <div class="flex gap-3">
                            <input type="text" 
                                   name="reservation_code" 
                                   value="{{ request('reservation_code') }}"
                                   class="flex-1 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                   placeholder="Masukkan kode reservasi Anda..."
                                   required>
                            <button type="submit" 
                                    class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                                Cari
                            </button>
                        </div>
                    </form>

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($reservation)
                        <div class="border-t pt-6">
                            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        Detail Reservasi
                                    </h3>
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold
                                        {{ $reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                                           ($reservation->status === 'approved' ? 'bg-green-100 text-green-800' :
                                            ($reservation->status === 'rejected' ? 'bg-red-100 text-red-800' :
                                             ($reservation->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800'))) }}">
                                        {{ ucfirst($reservation->status) }}
                                    </span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <strong class="text-gray-700 dark:text-gray-300">Kode Reservasi:</strong>
                                        <p class="text-gray-600 dark:text-gray-400 font-mono">{{ $reservation->reservation_code }}</p>
                                    </div>
                                    <div>
                                        <strong class="text-gray-700 dark:text-gray-300">Nama:</strong>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $reservation->guest_name }}</p>
                                    </div>
                                    <div>
                                        <strong class="text-gray-700 dark:text-gray-300">Perangkat Daerah:</strong>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $reservation->regionalDevice->name ?? '-' }}</p>
                                    </div>
                                    <div>
                                        <strong class="text-gray-700 dark:text-gray-300">Waktu Pertemuan:</strong>
                                        <p class="text-gray-600 dark:text-gray-400">
                                            {{ $reservation->meeting_time_start?->format('d/m/Y H:i') }} - 
                                            {{ $reservation->meeting_time_end?->format('H:i') }}
                                        </p>
                                    </div>
                                    @if($reservation->is_checked_in)
                                        <div class="md:col-span-2">
                                            <strong class="text-gray-700 dark:text-gray-300">Status Check-in:</strong>
                                            <p class="text-green-600 font-semibold">
                                                ✓ Sudah check-in pada {{ $reservation->checked_in_at?->format('d/m/Y H:i') }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('reservation.show', $reservation->reservation_code) }}"
                                       class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-center transition duration-200">
                                        Lihat Detail Lengkap
                                    </a>

                                    @if($reservation->canCheckIn())
                                        <form action="{{ route('reservation.checkin') }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="reservation_code" value="{{ $reservation->reservation_code }}">
                                            <button type="submit" 
                                                    class="w-full sm:w-auto px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                                                Absen Sekarang
                                            </button>
                                        </form>
                                    @elseif($reservation->is_checked_in)
                                        <button disabled 
                                                class="px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed">
                                            Sudah Check-in
                                        </button>
                                    @else
                                        <button disabled 
                                                class="px-4 py-2 bg-gray-400 text-white rounded-lg cursor-not-allowed"
                                                title="Check-in hanya dapat dilakukan maksimal 24 jam sebelum waktu pertemuan">
                                            Check-in Belum Tersedia
                                        </button>
                                    @endif

                                    @if($reservation->status === 'completed' && !$reservation->questionnaire)
                                        <a href="{{ route('reservation.questionnaire', $reservation->id) }}"
                                           class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 text-center transition duration-200">
                                            Beri Penilaian
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="text-center mt-8">
                    <p class="text-gray-600 dark:text-gray-400 mb-2">Sudah memiliki akun?</p>
                    <a href="{{ route('login') }}" 
                       class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-semibold">
                        Login untuk melihat riwayat reservasi
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection