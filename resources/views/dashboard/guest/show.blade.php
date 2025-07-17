@extends('layouts.dashboard')

@section('title', 'Detail Tamu - Dashboard')

@section('content')
            <div class="flex items-center justify-center h-full">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-6xl w-full">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 dark:text-white mb-8">
                        Detail Tamu
                    </h1>

                    <div class="space-y-6">
                        <div class="flex justify-center mb-6">
                            @php
    $statusClass = match ($reservation->status) {
        'pending' => 'bg-yellow-100 text-yellow-800',
        'approved' => 'bg-green-100 text-green-800',
        'rejected' => 'bg-red-100 text-red-800',
        'completed' => 'bg-blue-100 text-blue-800',
        'canceled' => 'bg-red-200 text-red-800',
        default => 'bg-gray-100 text-gray-800',
    };
                            @endphp
                            <span class="px-4 py-2 rounded-full text-sm font-medium {{ $statusClass }}">
                                {{ match ($reservation->status) {
        'pending' => 'Menunggu',
        'approved' => 'Disetujui',
        'rejected' => 'Ditolak',
        'completed' => 'Selesai',
        'canceled' => 'Dibatalkan',
        default => 'Unknown',
    } }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Nama Tamu
                                </label>
                                <input type="text" value="{{ $reservation->guest_name }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Kategori Tamu
                                </label>
                                <input type="text" value="{{ $reservation->guestCategory?->name ?? '-' }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Organisasi
                                </label>
                                <input type="text" value="{{ $reservation->organization ?? '-' }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Keperluan
                                </label>
                                <input type="text" value="{{ $reservation->guestPurpose?->name ?? '-' }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Tujuan Bidang
                                </label>
                                <input type="text" value="{{ $reservation->fieldPurpose?->name ?? '-' }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    No. HP/WhatsApp
                                </label>
                                <input type="text" value="{{ $reservation->phone_number }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Email
                                </label>
                                <input type="email" value="{{ $reservation->email }}" disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Waktu Pertemuan
                                </label>
                                <input type="text"
                                    value="{{ $reservation->meeting_time_start?->format('d F Y H:i') ?? '-' }} - {{ $reservation->meeting_time_end?->format('H:i') ?? '-' }}"
                                    disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Alamat
                                </label>
                                <textarea disabled rows="3"
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">{{ $reservation->address }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Tipe Reservasi
                                </label>
                                <input type="text"
                                    value="{{ $reservation->reservation_type === 'individual' ? 'Perseorangan' : 'Badan Hukum/Instansi' }}"
                                    disabled
                                    class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                            </div>
                        </div>

                        <div class="mt-6 space-y-4">
                            @if ($reservation->id_card_path)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        KTP
                                    </label>
                                    <a href="{{ Storage::url($reservation->id_card_path) }}" target="_blank"
                                        class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-md hover:bg-blue-200 transition-colors">
                                        Lihat KTP
                                    </a>
                                </div>
                            @endif

                            @if ($reservation->organization_document_path)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        SK Badan Hukum
                                    </label>
                                    <a href="{{ Storage::url($reservation->organization_document_path) }}" target="_blank"
                                        class="inline-block px-4 py-2 bg-blue-100 text-blue-800 rounded-md hover:bg-blue-200 transition-colors">
                                        Lihat SK Badan Hukum
                                    </a>
                                </div>
                            @endif

                            @if ($reservation->notes)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Catatan
                                    </label>
                                    <textarea disabled rows="3"
                                        class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">{{ $reservation->notes }}</textarea>
                                </div>
                            @endif

                            @if ($reservation->status === 'canceled')
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                        Alasan Pembatalan
                                    </label>
                                    <textarea disabled rows="3"
                                         class="w-full px-3 py-2 bg-red-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">{{ $reservation->canceled_notes }}</textarea>
                                </div>
                            @endif
                        </div>

                        <div class="flex justify-between mt-8">
                            <a href="{{ route('dashboard.guest.index') }}"
                                class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-all">
                                Kembali
                            </a>

                            @if ($reservation->status === 'pending')
                                <div class="space-x-3">
                                    <button type="button"
                                        class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition-all"
                                        data-bs-toggle="modal" data-bs-target="#rejectModal">
                                        Tolak
                                    </button>
                                    <button type="button"
                                        class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition-all"
                                        data-bs-toggle="modal" data-bs-target="#approveModal">
                                        Setujui
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div id="approveModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-lg w-full mx-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold dark:text-white">Setujui Reservasi</h3>
                        <button onclick="closeApproveModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('dashboard.guest.approve', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Apakah Anda yakin ingin menyetujui reservasi dari <strong>{{ $reservation->guest_name }}</strong>?
                            </p>
                            <div class="mb-4">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Catatan (Opsional)
                                </label>
                                <textarea name="notes" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    placeholder="Tambahkan catatan..."></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeApproveModal()"
                                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-all">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all">
                                Setujui
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 max-w-lg w-full mx-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold dark:text-white">Tolak Reservasi</h3>
                        <button onclick="closeRejectModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('dashboard.guest.reject', $reservation->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Apakah Anda yakin ingin menolak reservasi dari <strong>{{ $reservation->guest_name }}</strong>?
                            </p>
                            <div class="mb-4">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Alasan Penolakan <span class="text-red-500">*</span>
                                </label>
                                <textarea name="notes" rows="3" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    placeholder="Masukkan alasan penolakan..."></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeRejectModal()"
                                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-all">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all">
                                Tolak
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            @push('scripts')
                <script>
                    function showApproveModal() {
                        document.getElementById('approveModal').classList.remove('hidden');
                    }

                    function closeApproveModal() {
                        document.getElementById('approveModal').classList.add('hidden');
                    }

                    function showRejectModal() {
                        document.getElementById('rejectModal').classList.remove('hidden');
                    }

                    function closeRejectModal() {
                        document.getElementById('rejectModal').classList.add('hidden');
                    }

                    document.getElementById('approveModal').addEventListener('click', function(e) {
                        if (e.target === this) {
                            closeApproveModal();
                        }
                    });

                    document.getElementById('rejectModal').addEventListener('click', function(e) {
                        if (e.target === this) {
                            closeRejectModal();
                        }
                    });

                    document.querySelector('[data-bs-target="#approveModal"]').onclick = function(e) {
                        e.preventDefault();
                        showApproveModal();
                    };

                    document.querySelector('[data-bs-target="#rejectModal"]').onclick = function(e) {
                        e.preventDefault();
                        showRejectModal();
                    };
                </script>
            @endpush
@endsection
