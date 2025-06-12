@extends('layouts.dashboard')

@section('title', 'Tambah Perangkat Daerah - Dashboard')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
        Tambah Perangkat Daerah
    </h1>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('dashboard.regional-devices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Perangkat Daerah
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Logo
                </label>
                <input type="file" name="logo" id="logo" accept="image/*"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">PNG, JPG, JPEG atau GIF (Max. 2MB)</p>
                @error('logo')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Alamat
                </label>
                <input type="text" name="address" id="address" value="{{ old('address') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('address')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Deskripsi
                </label>
                <textarea name="description" id="description" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
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
