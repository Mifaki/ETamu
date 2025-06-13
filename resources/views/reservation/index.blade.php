@extends('layouts.app')

@section('title', 'Reservasi OPD - ETamu')

@section('content')
    <section>
        <div class="reserasi-opd h-max mt-28 md:mt-36">
            <div class="card-opd grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-6">
                @forelse($regionalDevices as $device)
                    <div
                        class="label text-center text-black dark:text-white bg-white dark:bg-gray-500 h-auto max-w-full rounded-lg shadow-lg px-4 py-5">
                        @if ($device->logo_path)
                            <img class="w-[50%] mx-auto object-contain" src="{{ asset('storage/' . $device->logo_path) }}"
                                alt="{{ $device->name }}">
                        @else
                            <div class="w-[50%] mx-auto h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400">No Logo</span>
                            </div>
                        @endif
                        <p class="mt-2">{{ $device->name }}</p>
                        @if ($device->address)
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
                        <form action="{{ route('reservation.index') }}" method="GET" class="flex gap-2">
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Cari reservasi...">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Cari
                            </button>
                        </form>
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
                                    Instansi</th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Status
                                </th>
                                <th
                                    class="py-3 px-4 border-b border-gray-200 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservations as $reservation)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150">
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        {{ $loop->iteration }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        {{ $reservation->created_at->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        {{ $reservation->guest_name }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white w-[200px]">
                                        {{ $reservation->organization ?? '-' }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                {{ $reservation->status === 'pending'
                                                                    ? 'bg-yellow-100 text-yellow-800'
                                                                    : ($reservation->status === 'approved'
                                                                        ? 'bg-green-100 text-green-800'
                                                                        : ($reservation->status === 'rejected'
                                                                            ? 'bg-red-100 text-red-800'
                                                                            : 'bg-gray-100 text-gray-800')) }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white">
                                        <div class="flex space-x-2">
                                            <button
                                                class="text-center text-white bg-green-500 px-8 py-2 rounded-lg md:rounded-full">
                                                <a href="{{ route('reservation.show', $reservation) }}">Lihat</a>
                                            </button>
                                            @if ($reservation->status === 'completed')
                                                <button
                                                    class="text-center text-white bg-blue-600 px-8 py-2 rounded-lg md:rounded-full">
                                                    <a
                                                        href="{{ route('reservation.questionnaire', ['id' => $reservation->id]) }}">Beri-nilai</a>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="py-2 px-4 border-b border-gray-200 text-gray-800 dark:text-white text-center">
                                        Tidak ada data reservasi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4 overflow-x-auto">
                {{ $reservations->links('pagination::tailwind') }}
            </div>
        </div>
    </section>
@endsection
