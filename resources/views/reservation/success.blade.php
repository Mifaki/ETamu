@extends('layouts.app')

@section('title', 'Reservasi Berhasil - ETamu')

@section('content')
    <section class="mt-28 md:mt-36 mb-20 md:mb-36">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="bg-green-50 border border-green-200 rounded-lg p-8 text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-bold text-green-800 mb-2">
                        Reservasi Berhasil Dibuat!
                    </h1>
                    <p class="text-green-700 mb-6">
                        Terima kasih telah membuat reservasi kunjungan ke Pemerintah Kabupaten Tangerang
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 border-2 border-blue-200 dark:border-blue-700 rounded-lg p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 text-center">
                        Kode Reservasi Anda
                    </h2>
                    <div class="bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-4 text-center">
                        <p class="text-3xl font-bold font-mono text-blue-800 dark:text-blue-200 tracking-wider mb-2">
                            {{ $reservation->reservation_code }}
                        </p>
                        <p class="text-sm text-blue-600 dark:text-blue-300">
                            Simpan kode ini untuk check-in nanti
                        </p>
                        
                        <button onclick="copyReservationCode(event)" 
                                class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 text-sm">
                            Salin Kode
                        </button>
                    </div>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-yellow-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.996-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        Informasi Penting
                    </h3>
                    <ul class="text-yellow-700 space-y-2 text-sm">
                        <li class="flex items-start">
                            <span class="font-bold mr-2">•</span>
                            <span><strong>Simpan kode reservasi</strong> dengan baik untuk keperluan check-in</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">•</span>
                            <span><strong>Check-in tersedia</strong> maksimal 24 jam sebelum waktu pertemuan</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">•</span>
                            <span><strong>Status reservasi</strong> akan diproses oleh admin dalam 1x24 jam</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">•</span>
                            <span><strong>Hubungi perangkat daerah</strong> jika ada perubahan jadwal</span>
                        </li>
                        <li class="flex items-start">
                            <span class="font-bold mr-2">•</span>
                            <span><strong>Datang tepat waktu</strong> sesuai jadwal yang telah ditentukan</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                        Detail Reservasi
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">Nama Tamu:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->guest_name }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">Email:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->email }}</p>
                        </div>
                        <div>
                            <strong class="text-gray-700 dark:text-gray-300">No. HP:</strong>
                            <p class="text-gray-600 dark:text-gray-400">{{ $reservation->phone_number }}</p>
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

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('reservation.index') }}" 
                       class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-center transition duration-200 font-semibold">
                        Cek Status Reservasi
                    </a>
                    
                    <a href="{{ route('reservation.create') }}" 
                       class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 text-center transition duration-200 font-semibold">
                        Buat Reservasi Lain
                    </a>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-3">
                        Butuh Bantuan?
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-3">
                        Jika Anda memiliki pertanyaan atau perlu mengubah jadwal, silakan hubungi:
                    </p>
                    <div class="text-sm text-gray-700 dark:text-gray-300">
                        <p><strong>Dinas Komunikasi dan Informatika Kabupaten Tangerang</strong></p>
                        <p>📧 Email: diskominfo@tangerangkab.go.id</p>
                        <p>📞 Telepon: (021) 5555-1234</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function copyReservationCode(event) {
            const code = '{{ $reservation->reservation_code }}';
            navigator.clipboard.writeText(code).then(function() {
                const button = event.target;
                const originalText = button.innerHTML;
                button.innerHTML = '✓ Tersalin!';
                button.className = button.className.replace('bg-blue-600 hover:bg-blue-700', 'bg-green-600');
                
                setTimeout(function() {
                    button.innerHTML = originalText;
                    button.className = button.className.replace('bg-green-600', 'bg-blue-600 hover:bg-blue-700');
                }, 2000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
                alert('Kode reservasi: ' + code);
            });
        }
        
        document.addEventListener('DOMContentLoaded', function() {
        });
    </script>
@endsection