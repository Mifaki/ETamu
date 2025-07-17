@extends('layouts.dashboard')

@section('title', 'Data Tamu - Dashboard')

@section('content')
    <h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
        Data Tamu
    </h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="mb-6 bg-white dark:bg-gray-800 p-6">
        <div class="flex flex-col md:flex-row items-end gap-4 w-1/3 ml-auto">
            <div class="flex-1">
                <label for="export-month" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Pilih Bulan untuk Export
                </label>
                <input type="month" id="export-month"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                    max="{{ date('Y-m') }}" placeholder="YYYY-MM">
            </div>
            <div class="flex-shrink-0">
                <button id="export-btn"
                    class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition-all disabled:bg-gray-300 disabled:cursor-not-allowed flex items-center gap-2"
                    disabled>
                    <i class="fas fa-download"></i>
                    Export ke Excel
                </button>
            </div>
        </div>
    </div>

    @include('components.dashboard.dash-table', [
    'headers' => [
        'Nama Tamu',
        'Kategori Tamu',
        'Keperluan',
        'Tujuan Bidang',
        'Tanggal Kunjungan',
        'Status',
        'Aksi',
    ],
    'data' => $reservations->map(function ($reservation) {
        $statusBadge = match ($reservation->status) {
            'pending'
            => '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Menunggu</span>',
            'approved'
            => '<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Disetujui</span>',
            'rejected'
            => '<span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Ditolak</span>',
            'completed'
            => '<span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Selesai</span>',
            'canceled'
            => '<span class="bg-red-200 text-red-500 text-xs font-medium px-2.5 py-0.5 rounded">Dibatalkan</span>',
            default
            => '<span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Unknown</span>',
        };

        return [
            'nama_tamu' => $reservation->guest_name,
            'kategori_tamu' => $reservation->guestCategory->name ?? '-',
            'keperluan' => $reservation->guestPurpose->name ?? '-',
            'tujuan_bidang' => $reservation->fieldPurpose->name ?? '-',
            'tanggal_kunjungan' => $reservation->meeting_time_start->format('d M Y H:i'),
            'status' => $statusBadge,
            'id' => $reservation->id,
            'status_raw' => $reservation->status,
        ];
    }),
    'actions' => function ($row) {
        $buttons =
            '<a href="' .
            route('dashboard.guest.show', $row['id']) .
            '" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-all">
                            Show
                        </a>';

        if ($row['status_raw'] === 'approved') {
            $buttons .=
                '
                            <form action="' .
                route('dashboard.guest.complete', $row['id']) .
                '" method="POST" class="inline-block">
                                ' .
                csrf_field() .
                method_field('PATCH') .
                '
                                <button type="submit"
                                    class="bg-purple-500 text-white px-3 py-1 rounded hover:bg-purple-600 transition-all"
                                    onclick="return confirm(\'Tandai sebagai selesai?\')">
                                    <i class="fas fa-check-double"></i> Selesai
                                </button>
                            </form>';
        }

        return $buttons;
    },
])

    <div class="mt-4">
        {{ $reservations->links('pagination::tailwind') }}
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const monthInput = document.getElementById('export-month');
                const exportBtn = document.getElementById('export-btn');

                monthInput.addEventListener('change', function() {
                    if (this.value) {
                        exportBtn.disabled = false;
                    } else {
                        exportBtn.disabled = true;
                    }
                });

                exportBtn.addEventListener('click', function() {
                    const selectedMonth = monthInput.value;
                    if (selectedMonth) {
                        // Create a form and submit it
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '{{ route('dashboard.guest.export') }}';

                        // Add CSRF token
                        const csrfToken = document.createElement('input');
                        csrfToken.type = 'hidden';
                        csrfToken.name = '_token';
                        csrfToken.value = '{{ csrf_token() }}';
                        form.appendChild(csrfToken);

                        // Add month parameter
                        const monthField = document.createElement('input');
                        monthField.type = 'hidden';
                        monthField.name = 'month';
                        monthField.value = selectedMonth;
                        form.appendChild(monthField);

                        // Submit form
                        document.body.appendChild(form);
                        form.submit();
                        document.body.removeChild(form);
                    }
                });
            });
        </script>
    @endpush
@endsection
