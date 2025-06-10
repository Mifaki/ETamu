@extends('layouts.app')

@section('title', 'Jadwal - ETamu Diskominfo')

@section('content')
    <div class="tagline text-center mt-28 md:mt-36 mb-8 md:mb-16 text-black dark:text-white">
        <h1 class="text-2xl md:text-4xl font-semibold mb-1 md:mb-2">
            Jadwal Penerimaan Tamu
        </h1>
        <p class="text-lg md:text-xl">Daftar penerimaan tamu di Pemerintah</p>
        <p class="text-lg md:text-xl">Kabupaten Tangerang</p>
    </div>

    <h3 class="text-xl md:text-2xl text-black dark:text-white mb-3">
        Keterangan Warna :
    </h3>
    <div class="list-warna flex-row md:flex">
        <div class="list-warna-satu mr-14">
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/biru-tua.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">
                    Pemerintah Pusat (Kementrian/lembaga)
                </p>
            </div>
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/hijau.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">
                    Pemerintah Daerah Lain
                </p>
            </div>
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/merah-muda.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">Akademisi</p>
            </div>
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/coklat.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">
                    Kelompok Masyarakat
                </p>
            </div>
        </div>

        <div class="list-warna-dua">
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/coklat.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">
                    DPRD Provinsi/Kabupaten/Kota Lain
                </p>
            </div>
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/emerlad.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">
                    BUMD Kabupaten/Kota lain
                </p>
            </div>
            <div class="flex mb-2">
                <img class="mr-4" src="{{ asset('assets/img/palet-warna/orange.png') }}" alt="warna" />
                <p class="text-sm text-gray-800 dark:text-gray-100">
                    Lembaga Non Pemerintah/Swasta
                </p>
            </div>
        </div>
    </div>

    <div class="mx-auto mt-10 bg-white dark:bg-gray-800 rounded-lg shadow-lg mb-16 md:mb-36 overflow-x-auto">
        <div class="flex items-center justify-between p-4 border-b dark:border-gray-700 min-w-[768px]">
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <div class="text-lg font-semibold dark:text-gray-200">
                Oktober 2024
            </div>
            <div class="flex space-x-2">
                <button class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                    Hari Ini
                </button>
                <button class="px-3 py-1 text-sm bg-gray-200 text-gray-600 rounded dark:bg-gray-700 dark:text-gray-300">
                    Bulanan
                </button>
                <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-300">
                    Mingguan
                </button>
                <button class="px-3 py-1 text-sm text-gray-500 hover:text-gray-700 dark:text-gray-300">
                    Harian
                </button>
            </div>
            <button class="text-gray-500 hover:text-gray-700 dark:text-gray-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-7 gap-2 p-4 text-center min-w-[768px]">
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Min</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Sen</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Sel</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Rab</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Kam</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Jum</div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Sab</div>

            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>

            <div class="py-4 dark:text-gray-200">1</div>
            <div class="py-4 dark:text-gray-200">2</div>
            <div class="py-4 dark:text-gray-200">3</div>
            <div class="py-4 dark:text-gray-200">4</div>
            <div class="py-4 dark:text-gray-200">5</div>
            <div class="py-4 dark:text-gray-200">6</div>
            <div class="py-4 dark:text-gray-200">7</div>
            <div class="py-4 dark:text-gray-200">8</div>
            <div class="py-4 dark:text-gray-200">9</div>
            <div class="py-4 dark:text-gray-200">10</div>
            <div class="py-4 dark:text-gray-200">11</div>
            <div class="py-4 dark:text-gray-200">12</div>
            <div class="py-4 dark:text-gray-200">13</div>
            <div class="py-4 bg-yellow-100 dark:bg-yellow-700 dark:text-black">14</div>
            <div class="py-4 dark:text-gray-200">15</div>
            <div class="relative py-4 dark:text-gray-200">
                16
                <div class="absolute inset-0 flex justify-center items-center">
                    <div class="bg-green-500 text-white text-xs rounded px-2 py-1">
                        10:00 Dinas Kominfo<br />Kota Palembang
                    </div>
                </div>
            </div>
            <div class="py-4 dark:text-gray-200">17</div>
            <div class="py-4 dark:text-gray-200">18</div>
            <div class="py-4 dark:text-gray-200">19</div>
            <div class="py-4 dark:text-gray-200">20</div>
            <div class="py-4 dark:text-gray-200">21</div>
            <div class="py-4 dark:text-gray-200">22</div>
            <div class="py-4 dark:text-gray-200">23</div>
            <div class="py-4 dark:text-gray-200">24</div>
            <div class="py-4 dark:text-gray-200">25</div>
            <div class="py-4 dark:text-gray-200">26</div>
            <div class="py-4 dark:text-gray-200">27</div>
            <div class="py-4 dark:text-gray-200">28</div>
            <div class="py-4 dark:text-gray-200">29</div>
            <div class="py-4 dark:text-gray-200">30</div>
            <div class="py-4 dark:text-gray-200">31</div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .calendar-event {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }
</style>
@endpush
