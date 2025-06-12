@extends('layouts.dashboard')

@section('title', 'Manajemen Perangkat Daerah - Dashboard')

@section('content')
    <h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
        Manajemen Perangkat Daerah
    </h1>

    <div class="flex justify-end mb-6">
        <a href="{{ route('dashboard.regional-devices.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Perangkat
        </a>
    </div>

    @include('components.dashboard.dash-table', [
        'headers' => ['Nama', 'Alamat', 'Deskripsi', 'Aksi'],
        'data' => $regionalDevices,
        'actions' => function ($row) {
            return '
                                        <a href="' . route('dashboard.regional-devices.edit', $row->id) . '" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-all">Edit</a>
                                        <form action="' . route('dashboard.regional-devices.destroy', $row->id) . '" method="POST" class="d-inline" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus perangkat daerah ini?\');">
                                            ' . csrf_field() . '
                                            ' . method_field('DELETE') . '
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-all">Hapus</button>
                                        </form>
                                    ';
        }
    ])

    <div class="d-flex justify-content-end mt-3">
        {{ $regionalDevices->links() }}
    </div>
@endsection
