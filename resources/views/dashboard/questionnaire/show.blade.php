@extends('layouts.dashboard')

@section('title', 'Detail Kuesioner - Dashboard')

@section('content')
<?php
    $questionnaire = [
        'id'                => 1,
        'nama_tamu'         => 'John Doe',
        'email'             => 'john@example.com',
        'pelayanan'         => 'Layanan sangat memuaskan',
        'kebersihan'        => 'Sangat bersih',
        'fasilitas'         => 'Fasilitas lengkap',
        'saran_masukan'     => 'Tetap pertahankan kualitas pelayanan',
        'tanggal_kunjungan' => '2024-10-01',
    ];
?>

<div class="container mx-auto p-6 sm:max-w-4xl">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden">
        <div class="p-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 dark:text-white mb-10">
                Detail Kuesioner Tamu
            </h1>

            <table class="table-auto w-full text-left">
                <tbody>
                    <tr class="bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Nama Tamu
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['nama_tamu'] }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Email
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['email'] }}
                        </td>
                    </tr>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Pelayanan
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['pelayanan'] }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Kebersihan
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['kebersihan'] }}
                        </td>
                    </tr>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Fasilitas
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['fasilitas'] }}
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-800">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Saran & Masukan
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['saran_masukan'] }}
                        </td>
                    </tr>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <td class="px-6 py-4 font-semibold text-gray-700 dark:text-gray-300">
                            Tanggal Kunjungan
                        </td>
                        <td class="px-6 py-4 text-gray-900 dark:text-white">
                            {{ $questionnaire['tanggal_kunjungan'] }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-center mt-10">
                <a
                    href="{{ route('dashboard.questionnaire.index') }}"
                    class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-blue-600 transition-all"
                >
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection