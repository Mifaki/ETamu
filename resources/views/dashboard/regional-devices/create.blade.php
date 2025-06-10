@extends('layouts.dashboard')

@section('title', 'Tambah Perangkat Daerah - Dashboard')

@section('content')
<div class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-lg bg-white dark:bg-gray-700 shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 dark:text-white mb-8">
            Tambah Perangkat Daerah
        </h1>

        <form action="{{ route('dashboard.regional-devices.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label
                    for="nama_perangkat_daerah"
                    class="block text-gray-700 dark:text-gray-200 font-semibold mb-2"
                >Nama Perangkat Daerah</label>
                <input
                    type="text"
                    id="nama_perangkat_daerah"
                    name="nama_perangkat_daerah"
                    required
                    class="w-full p-3 border border-gray-300 rounded-lg dark:bg-gray-600 dark:border-gray-500 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out hover:shadow-md"
                />
            </div>

            <div class="flex justify-end">
                <a
                    href="{{ route('dashboard.regional-devices.index') }}"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition-all mr-3"
                >
                    Batal
                </a>
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out"
                >
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
