@extends('layouts.app')

@section('title', 'Detail Reservasi - ETamu')

@section('content')
<section>
    <div class="container mx-auto px-4 py-8 mt-12 md:mt-24">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100 mb-6">
            Data Anda
        </h1>

        <div class="bg-white dark:bg-gray-800 p-6 rounded-md shadow-md mb-8">
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700">
                    <tbody>
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Nama Tamu
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                Ahmad Sanusi
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Kategori Tamu
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                Kategori 1
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Foto Tamu
                            </th>
                            <td class="px-6 py-4">
                                <img src="{{ asset('assets/img/selfie.png') }}" alt="Foto Tamu" class="w-32 h-32 rounded-md shadow-md" />
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Organisasi
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                PT. Sejahtera Bersama
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Keperluan
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                Rapat dengan Direktur Utama
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                No HP/Whatsapp
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                085935316990
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Perangkat Daerah
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                Dinas Komunikasi dan Informatika
                            </td>
                        </tr>

                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                Email
                            </th>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                ahmad.sanusi@example.com
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
            Informasi Tambahan
        </h2>
        <div class="bg-white dark:bg-gray-800 p-6 rounded-md shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">No</th>
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">Tanggal</th>
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">Keperluan</th>
                            <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">Perangkat Daerah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">1</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">12-10-2024</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">Rapat Proyek</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">Dinas Pekerjaan Umum</td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-gray-700">
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">2</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">05-10-2024</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">Konsultasi Teknologi</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">Dinas Komunikasi dan Informatika</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
