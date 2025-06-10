@extends('layouts.dashboard')

@section('title', 'Data Kuesioner - Dashboard')

@section('content')
<h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
    Data Kuesioner
</h1>

<?php
    $questionnaires = [
        [
            'id'                => 1,
            'nama_tamu'         => 'John Doe',
            'email'             => 'john@example.com',
            'pelayanan'         => 'Layanan sangat memuaskan',
            'kebersihan'        => 'Sangat bersih',
            'fasilitas'         => 'Fasilitas lengkap dan nyaman',
            'saran_&_masukan'   => 'Mungkin bisa ditambah ruang tunggu',
            'tanggal_kunjungan' => '2024-10-01',
        ],
        [
            'id'                => 2,
            'nama_tamu'         => 'Jane Smith',
            'email'             => 'jane@example.com',
            'pelayanan'         => 'Cukup memuaskan',
            'kebersihan'        => 'Bersih',
            'fasilitas'         => 'Fasilitas cukup',
            'saran_&_masukan'   => 'Akan lebih baik jika ada lebih banyak kursi',
            'tanggal_kunjungan' => '2024-10-02',
        ],
        [
            'id'                => 3,
            'nama_tamu'         => 'Alice Johnson',
            'email'             => 'alice@example.com',
            'pelayanan'         => 'Pelayanan ramah',
            'kebersihan'        => 'Sangat bersih',
            'fasilitas'         => 'Fasilitas sangat baik',
            'saran_&_masukan'   => 'Tingkatkan kecepatan layanan',
            'tanggal_kunjungan' => '2024-10-03',
        ],
    ];

    $headers = ['Nama Tamu', 'Email', 'Pelayanan', 'Kebersihan', 'Fasilitas', 'Saran & Masukan', 'Tanggal Kunjungan', 'Aksi'];
?>

@include('components.dashboard.dash-table', [
    'headers' => $headers,
    'data' => $questionnaires,
    'actions' => function ($row) {
        return '<a href="' . route('dashboard.questionnaire.show', ['id' => $row['id']]) . '" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-all">Show</a>' .
               '<form action="' . route('dashboard.questionnaire.destroy', ['id' => $row['id']]) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this questionnaire data?\');">' .
               csrf_field() . method_field('DELETE') .
               '<button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-all">Hapus</button>' .
               '</form>';
    }
])
@endsection