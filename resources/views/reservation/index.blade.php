@extends('layouts.app')

@section('title', 'Reservasi OPD - ETamu')

@section('content')
    <section>
        <div class="reserasi-opd h-max mt-28 md:mt-36">
            <div class="card-opd grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-6">
                @forelse($regionalDevices as $device)
                    <div
                        class="label text-center text-black dark:text-white bg-white dark:bg-gray-500 h-auto max-w-full rounded-lg shadow-lg px-4 py-5">
                        @if($device->logo_path)
                            <img class="w-[50%] mx-auto object-contain" src="{{ asset('storage/' . $device->logo_path) }}"
                                alt="{{ $device->name }}">
                        @else
                            <div class="w-[50%] mx-auto h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400">No Logo</span>
                            </div>
                        @endif
                        <p class="mt-2">{{ $device->name }}</p>
                        @if($device->address)
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ Str::limit($device->address, 30) }}</p>
                        @endif
                        <p class="text-green-400 font-semibold">0 kunjungan</p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada perangkat daerah yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <nav aria-label="Page navigation" class="flex justify-center mt-7 md:mt-12">
                {{ $regionalDevices->links('pagination::tailwind') }}
            </nav>

            <div class="tagline text-center mt-12 md:mt-16 mb-8 md:mb-16 text-black dark:text-white">
                <h1 class="text-2xl md:text-4xl font-semibold mb-1 md:mb-2">
                    Reservasi
                </h1>
                <p class="text-lg md:text-xl">Daftar Riwayat Reservasi Anda di Pemerintah</p>
                <p class="text-lg md:text-xl">Kabupaten Tangerang</p>
            </div>

            <div class="tabel-reservasi mb-20 md:mb-36">
                <div class="flex flex-col md:flex-row justify-between items-center mt-8 md:mt-16 space-y-4 md:space-y-0">
                    <button
                        class="w-full md:w-1/2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 md:mr-4">
                        <a href="{{ route('reservation.create') }}">+ Reservasi</a>
                    </button>

                    <div class="w-full md:w-1/2">
                        <input type="text" placeholder="Cari reservasi anda..."
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    </div>
                </div>

                <div class="mt-4 overflow-x-auto">
                    <table
                        class="w-max md:min-w-full bg-white dark:bg-gray-800 border border-gray-200 shadow-lg rounded-lg overflow-hidden table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    No</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Tanggal Reservasi</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Nama</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300 w-[200px]">
                                    Jenis Reservasi</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">1</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">2023-01-01</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">John Doe</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white w-[200px]">
                                    Reservasi Ruang</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                    <div class="flex space-x-2">
                                        <button
                                            class="text-center text-white bg-green-500 px-8 py-2 rounded-lg md:rounded-full">
                                            <a href="{{ route('reservation.show', ['id' => 1]) }}">Lihat</a>
                                        </button>
                                        <button
                                            class="text-center text-white bg-blue-600 px-8 py-2 rounded-lg md:rounded-full">
                                            <a href="{{ route('reservation.questionnaire', ['id' => 1]) }}">Beri-nilai</a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
