@extends('layouts.dashboard')

@section('title', 'Data Tamu - Dashboard')

@section('content')
<h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
    Data Tamu
</h1>

<?php
    $guests = [
        [
            'id'                => 1,
            'nama_tamu'         => 'John Doe',
            'kategori_tamu'     => 'VIP',
            'keperluan'         => 'Rapat dengan Direktur',
            'tujuan_bidang'     => 'Bidang IT',
            'tanggal_kunjungan' => '23 Oktober 2024',
        ],
        [
            'id'                => 2,
            'nama_tamu'         => 'Jane Smith',
            'kategori_tamu'     => 'Umum',
            'keperluan'         => 'Konsultasi',
            'tujuan_bidang'     => 'Bidang Keuangan',
            'tanggal_kunjungan' => '25 Oktober 2024',
        ],
    ];

    $headers = ['Nama Tamu', 'Kategori Tamu', 'Keperluan', 'Tujuan Bidang', 'Tanggal Kunjungan', 'Aksi'];
?>

@include('components.dashboard.dash-table', [
    'headers' => $headers,
    'data' => $guests,
    'actions' => function ($row) {
        return '<a href="' . route('dashboard.guest.show', ['id' => $row['id']]) . '" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-all">Show</a>' .
               '<form action="' . route('dashboard.guest.destroy', ['id' => $row['id']]) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this guest data?\');">' .
               csrf_field() . method_field('DELETE') .
               '<button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-all">Hapus</button>' .
               '</form>';
    }
])
@endsection