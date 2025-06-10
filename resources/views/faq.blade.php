@extends('layouts.app')

@section('title', 'FAQ - ETamu Diskominfo')

@section('content')
    <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white" class="h-max mt-28 md:mt-36 mb-20 md:mb-36">
        <h1 class="text-2xl md:text-4xl font-semibold text-black dark:text-white text-center mb-12 md:mb-16">
            Pertanyaan Yang Sering Ditanyakan
        </h1>

        <h2 id="accordion-color-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
                <span>Siapa yang bisa melakukan kunjungan?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Perwakilan yang berasal dari Pemerintah Pusat (Kementerian/Lembaga), DPRD Provinsi/Kabupaten/Kota, Pemerintah Daerah, BUMD Kabupaten/Kota, Akademisi, Lembaga non Pemerintah/Swasta dan Kelompok Masyarakat yang berkunjung ke Pemerintah Kota Tangerang untuk keperluan dinas yang berkaitan dengan penyelenggaraan pemerintahan.
                </p>
            </div>
        </div>

        <h2 id="accordion-color-heading-2">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
                <span>Bagaimana cara mengajukan permohonan kunjungan?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Pengajuan permohonan kunjungan ke Pemerintah Kota Tangerang hanya dilakukan melalui Aplikasi Penerimaan Tamu yang terdapat pada Website Resmi Pemerintah Kota Tangerang.
                </p>
            </div>
        </div>

        <h2 id="accordion-color-heading-3">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-3" aria-expanded="false" aria-controls="accordion-color-body-3">
                <span>Mengapa saya tidak bisa mengajukan kunjungan di hari esok?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Permohonan kunjungan dapat diajukan melalui aplikasi minimal 3 hari sebelum tanggal kunjungan.
                </p>
            </div>
        </div>

        <h2 id="accordion-color-heading-4">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-t-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-4" aria-expanded="false" aria-controls="accordion-color-body-4">
                <span>Apa yang harus dilakukan setelah daftar melalui aplikasi website?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-4">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Silakan tunggu informasi melalui pesan notifikasi WhatsApp dan atau konfirmasi WhatsApp dari sekretariat OPD tujuan.
                </p>
            </div>
        </div>

        <h2 id="accordion-color-heading-5">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-t-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-5" aria-expanded="false" aria-controls="accordion-color-body-5">
                <span>Bagaimana cara merubah/membatalkan kunjungan yang telah diajukan?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-5" class="hidden" aria-labelledby="accordion-color-heading-5">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Permohonan yang sudah diajukan tidak dapat diubah/dibatalkan. Silakan tunggu konfirmasi WhatsApp dari sekretariat OPD tujuan.
                </p>
            </div>
        </div>

        <h2 id="accordion-color-heading-6">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-t-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-6" aria-expanded="false" aria-controls="accordion-color-body-6">
                <span>Surat permohonan kunjungan ditujukan kepada siapa?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-6" class="hidden" aria-labelledby="accordion-color-heading-6">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Surat Permohonan Kunjungan untuk tamu Walikota/Wakil Walikota ditujukan kepada Walikota, sedangkan untuk tamu OPD ditujukan kepada Kepala OPD.
                </p>
            </div>
        </div>

        <h2 id="accordion-color-heading-7">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-t-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-7" aria-expanded="false" aria-controls="accordion-color-body-7">
                <span>Bagaimana jika tamu Walikota/Wakil Walikota berasal dari DPR RI, Menteri, Gubernur, Walikota, Bupati, atau tamu dari luar negeri?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-color-body-7" class="hidden" aria-labelledby="accordion-color-heading-7">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-600 dark:bg-gray-800 mb-2 md:mb-4">
                <p class="mb-2 text-gray-500 dark:text-gray-400">
                    Tamu-tamu tersebut di atas merupakan pengecualian, sehingga dapat langsung mengajukan permohonan kunjungan tanpa melalui aplikasi.
                </p>
            </div>
        </div>
    </div>
@endsection
