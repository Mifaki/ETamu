@extends('layouts.dashboard')

@section('title', 'Buat Keperluan Tamu - Dashboard')

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-lg w-full">
        <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 dark:text-white mb-8">
            Buat Keperluan Tamu
        </h1>

        <form action="{{ route('dashboard.guest-purposes.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200" for="nama_keperluan">
                    Nama Keperluan Tamu
                </label>
                <input
                    type="text"
                    id="nama_keperluan"
                    name="nama_keperluan"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-700 p-2"
                    placeholder="Masukkan nama keperluan tamu"
                    required
                />
            </div>

            <div class="flex justify-end">
                <a
                    href="{{ route('dashboard.guest-purposes.index') }}"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition-all mr-3"
                >
                    Batal
                </a>
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all"
                >
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
