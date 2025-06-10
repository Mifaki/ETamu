@extends('layouts.app')

@section('title', 'Beranda - ETamu Diskominfo')

@section('content')
    <section class="h-max md:h-screen pt-28 md:pt-28 mb-16 md:mb-32">
        <div class="md:flex md:justify-between md:items-center">
            <div class="tagline-kiri text-center md:text-start">
                <h1 class="text-5xl md:text-8xl font-bold text-black dark:text-white mb-2 md:mb-4">
                    SELAMAT <br />
                    DATANG
                </h1>
                <p class="text-xl md:text-xl mb-8 md:mb-16 text-black dark:text-white">
                    Penerimaan kunjungan kerja di Pemerintah kabupaten Tangerang.
                </p>
                <button class="text-white font-semibold text-sm md:text-lg bg-green-600 px-5 py-3 rounded-full mr-1 md:mr-3">
                    <a href="#">Reservasi Sekarang</a>
                </button>
                <button class="text-white font-semibold text-sm md:text-lg bg-blue-600 px-5 py-3 rounded-full">
                    <a href="https://www.youtube.com/watch?v=9lYyyUXoae0">Video Tutorial</a>
                </button>
            </div>
            <div class="tagline-kanan mb-10 md:mb-20 md:pr-16">
                <div id="lottie-animation" class="w-full h-[350px] md:h-[500px]"></div>
            </div>
        </div>
    </section>
@endsection
