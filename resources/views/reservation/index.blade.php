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
                    Reservasi
                </h1>
                <p class="text-lg md:text-xl">Daftar Riwayat Reservasi Anda di Pemerintah</p>
                <p class="text-lg md:text-xl">Kabupaten Tangerang</p>
            </div>

            <div class="tabel-reservasi mb-20 md:mb-36">
                <div class="flex flex-col md:flex-row justify-between items-center mt-8 md:mt-16 space-y-4 md:space-y-0">
                    <button
                        class="w-full md:w-1/2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 md:mr-4">
                        <a href="{{ route('reservation.create') }}">+ Reservasi</a>
                    </button>

                    <div class="w-full md:w-1/2">
                        <form action="{{ route('reservation.index') }}" method="GET" class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white w-full"
                                placeholder="Cari reservasi...">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Cari
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-4 overflow-x-auto">
                    <table
                        class="w-max md:min-w-full bg-white dark:bg-gray-800 border border-gray-200 shadow-lg rounded-lg overflow-hidden table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    No</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Tanggal Reservasi</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Nama</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300 w-[200px]">
                                    Instansi</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Status
                                </th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        {{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        {{ $reservation->created_at->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        {{ $reservation->guest_name }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white w-[200px]">
                                        {{ $reservation->organization ?? '-' }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                {{ $reservation->status === 'pending'
                                                                    ? 'bg-yellow-100 text-yellow-800'
                                                                    : ($reservation->status === 'approved'
                                                                        ? 'bg-green-100 text-green-800'
                                                                        : ($reservation->status === 'rejected'
                                                                            ? 'bg-red-100 text-red-800'
                                                                            : ($reservation->status === 'canceled'
                                                                                ? 'bg-red-200 text-red-800'
                                                                                : 'bg-gray-100 text-gray-800'))) }}">
                                            {{ match($reservation->status) {
                                                'pending' => 'Menunggu',
                                                'approved' => 'Disetujui',
                                                'rejected' => 'Ditolak',
                                                'completed' => 'Selesai',
                                                'canceled' => 'Dibatalkan',
                                                default => ucfirst($reservation->status),
                                            } }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                            <button
                                                class="text-center text-white bg-green-500 px-4 py-2 rounded-lg">
                                                <a href="{{ route('reservation.show', $reservation) }}">Lihat</a>
                                            </button>
                                            
                                            @if($reservation->canCheckIn())
                                                <form action="{{ route('reservation.checkin') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="reservation_code" value="{{ $reservation->reservation_code }}">
                                                    <button type="submit" 
                                                            class="text-center text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                                                        Absen Sekarang
                                                    </button>
                                                </form>
                                            @elseif($reservation->is_checked_in)
                                                <button disabled 
                                                        class="text-center text-white bg-gray-400 px-4 py-2 rounded-lg cursor-not-allowed">
                                                    Sudah Check-in
                                                </button>
                                            @else
                                                <button disabled 
                                                        class="text-center text-white bg-gray-400 px-4 py-2 rounded-lg cursor-not-allowed"
                                                        title="Check-in hanya dapat dilakukan maksimal 24 jam sebelum waktu pertemuan">
                                                    Check-in Belum Tersedia
                                                </button>
                                            @endif

                                            @if ($reservation->status === 'completed' && !$reservation->questionnaire)
                                                <button
                                                    class="text-center text-white bg-purple-600 px-4 py-2 rounded-lg">
                                                    <a
                                                        href="{{ route('reservation.questionnaire', ['id' => $reservation->id]) }}">Beri nilai</a>
                                                </button>
                                            @endif
                                            @if ($reservation->status === 'pending')
                                                @php
                                                    $disableCancel = false;
                                                    $now = \Carbon\Carbon::now();
                                                    $meetingStart = \Carbon\Carbon::parse($reservation->meeting_time_start);
                                                    $disableCancel = $now->diffInDays($meetingStart, false) === 1 && $now->isSameDay($meetingStart->copy()->subDay());
                                                @endphp
                                                <button
                                                    class="text-center text-white bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200"
                                                    data-modal-target="cancel-modal-{{ $reservation->id }}"
                                                    data-modal-toggle="cancel-modal-{{ $reservation->id }}"
                                                    @if($disableCancel) disabled class="opacity-50 cursor-not-allowed" @endif
                                                >
                                                    Batalkan
                                                </button>

                                                <div id="cancel-modal-{{ $reservation->id }}" tabindex="-1" aria-hidden="true" style="display:none;" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full flex items-center justify-center bg-black bg-opacity-50">
                                                    <div class="relative w-full max-w-md h-full md:h-auto">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center close-cancel-modal" data-modal-hide="cancel-modal-{{ $reservation->id }}">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" class="p-6">
                                                                @csrf
                                                                <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Batalkan Reservasi</h3>
                                                                <div class="mb-4">
                                                                    <label for="canceled_notes_{{ $reservation->id }}" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Alasan Pembatalan</label>
                                                                    <textarea id="canceled_notes_{{ $reservation->id }}" name="canceled_notes" rows="3" required class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white p-2"></textarea>
                                                                </div>
                                                                <div class="flex justify-end">
                                                                    <button type="button" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-lg close-cancel-modal" data-modal-hide="cancel-modal-{{ $reservation->id }}">Batal</button>
                                                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Kirim</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white text-center">
                                        Tidak ada data reservasi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4 overflow-x-auto">
                {{ $reservations->links('pagination::tailwind') }}
            </div>
        </div>
    </section>

    @if(session('error'))
        <div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50" id="error-message">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <script>
        setTimeout(function() {
            const errorMsg = document.getElementById('error-message');
            const successMsg = document.getElementById('success-message');
            if (errorMsg) errorMsg.style.display = 'none';
            if (successMsg) successMsg.style.display = 'none';
        }, 5000);

        // Modal logic
        document.querySelectorAll('[data-modal-toggle]').forEach(btn => {
            btn.addEventListener('click', function() {
                const target = document.getElementById(this.getAttribute('data-modal-target'));
                if (target) target.style.display = 'flex';
            });
        });
        document.querySelectorAll('.close-cancel-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                const modalId = this.getAttribute('data-modal-hide');
                const modal = document.getElementById(modalId);
                if (modal) modal.style.display = 'none';
            });
        });
        // Prevent form submit if textarea is empty
        document.querySelectorAll('form[action*="reservation/cancel"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                const textarea = this.querySelector('textarea[name="canceled_notes"]');
                if (!textarea.value.trim()) {
                    textarea.classList.add('border-red-500');
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection