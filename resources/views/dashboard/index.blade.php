@extends('layouts.dashboard')

@section('title', 'Dashboard - ETamu')

@section('content')
<h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
    Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
    <div
        class="bg-gradient-to-br from-teal-400 to-teal-500 dark:from-teal-600 dark:to-teal-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105"
    >
        <h2 class="text-xl font-semibold text-white mb-4">Jumlah Tamu</h2>
        <p class="text-5xl font-bold text-white">150</p>
    </div>

    <div
        class="bg-gradient-to-br from-indigo-400 to-indigo-500 dark:from-indigo-600 dark:to-indigo-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105"
    >
        <h2 class="text-xl font-semibold text-white mb-4">Kategori Tamu</h2>
        <p class="text-5xl font-bold text-white">8</p>
    </div>

    <div
        class="bg-gradient-to-br from-yellow-400 to-yellow-500 dark:from-yellow-600 dark:to-yellow-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105"
    >
        <h2 class="text-xl font-semibold text-white mb-4">
            Tamu Berdasarkan Keperluan
        </h2>
        <p class="text-5xl font-bold text-white">50</p>
    </div>

    <div
        class="bg-gradient-to-br from-green-400 to-green-500 dark:from-green-600 dark:to-green-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105"
    >
        <h2 class="text-xl font-semibold text-white mb-4">
            Tamu Berdasarkan Tujuan
        </h2>
        <p class="text-5xl font-bold text-white">50</p>
    </div>

    <div
        class="bg-gradient-to-br from-red-400 to-red-500 dark:from-red-600 dark:to-red-700 shadow-lg rounded-lg p-8 text-center transition-all hover:shadow-2xl transform hover:scale-105"
    >
        <h2 class="text-xl font-semibold text-white mb-4">
            10 Bidang Sering Dikunjungi
        </h2>
        <p class="text-5xl font-bold text-white">50</p>
    </div>

</div>
@endsection
