@extends('layouts.dashboard')

@section('title', 'Detail Tamu - Dashboard')

@section('content')
<?php
    $guest = [
        'id'            => 1,
        'nama'          => 'Budi Santoso',
        'instansi'      => 'PT. Sukses Mandiri',
        'keperluan'     => 'Rapat Kerjasama',
        'bidang_tujuan' => 'Bidang Pengembangan',
        'tanggal'       => '2024-10-25',
        'waktu'         => '10:00',
    ];
?>

<div class="flex justify-center items-center min-h-screen">
    <div class="p-6 w-full max-w-6xl bg-white dark:bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-6 text-center">
            Show Tamu
        </h1>

        <div class="overflow-x-auto relative shadow-lg sm:rounded-lg mb-6">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">Nama</th>
                        <th scope="col" class="py-3 px-6">Instansi</th>
                        <th scope="col" class="py-3 px-6">Keperluan</th>
                        <th scope="col" class="py-3 px-6">Bidang Tujuan</th>
                        <th scope="col" class="py-3 px-6">Tanggal</th>
                        <th scope="col" class="py-3 px-6">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6">{{ $guest['nama'] }}</td>
                        <td class="py-4 px-6">{{ $guest['instansi'] }}</td>
                        <td class="py-4 px-6">{{ $guest['keperluan'] }}</td>
                        <td class="py-4 px-6">{{ $guest['bidang_tujuan'] }}</td>
                        <td class="py-4 px-6">{{ $guest['tanggal'] }}</td>
                        <td class="py-4 px-6">{{ $guest['waktu'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <a
                href="{{ route('dashboard.guest.index') }}"
                class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-all"
            >
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection