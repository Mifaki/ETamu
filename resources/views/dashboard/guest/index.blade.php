@extends('layouts.dashboard')

@section('title', 'Data Tamu - Dashboard')

@section('content')
    <h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
        Data Tamu
    </h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @include('components.dashboard.dash-table', [
        'headers' => ['Nama Tamu', 'Kategori Tamu', 'Keperluan', 'Tujuan Bidang', 'Tanggal Kunjungan', 'Status', 'Aksi'],
        'data' => $reservations->map(function ($reservation) {
            $statusBadge = match($reservation->status) {
                'pending' => '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Menunggu</span>',
                'approved' => '<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Disetujui</span>',
                'rejected' => '<span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Ditolak</span>',
                'completed' => '<span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Selesai</span>',
                'canceled' => '<span class="bg-red-200 text-red-500 text-xs font-medium px-2.5 py-0.5 rounded">Dibatalkan</span>',
                default => '<span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Unknown</span>'
            };

            return [
                'nama_tamu' => $reservation->guest_name,
                'kategori_tamu' => $reservation->guestCategory->name ?? '-',
                'keperluan' => $reservation->guestPurpose->name ?? '-',
                'tujuan_bidang' => $reservation->fieldPurpose->name ?? '-',
                'tanggal_kunjungan' => $reservation->meeting_time_start->format('d M Y H:i'),
                'status' => $statusBadge,
                'id' => $reservation->id,
                'status_raw' => $reservation->status
            ];
        }),
        'actions' => function ($row) {
            $buttons = '<a href="' . route('dashboard.guest.show', $row['id']) . 
                      '" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-all">
                        Show
                      </a>';

            if ($row['status_raw'] === 'approved') {
                $buttons .= '
                    <form action="' . route('dashboard.guest.complete', $row['id']) . '" method="POST" class="inline-block">
                        ' . csrf_field() . method_field('PATCH') . '
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
@endsection