@extends('layouts.dashboard')

@section('title', 'Tambah Keperluan Tamu - Dashboard')

@section('content')
    <div class="flex items-center justify-center h-full">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-lg w-full">
            <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 dark:text-white mb-8">
                Buat Keperluan Tamu
            </h1>

            <form action="{{ route('dashboard.guest-purposes.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Nama Keperluan
                    </label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Deskripsi
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('dashboard.guest-purposes.index') }}"
                        class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition-all mr-3">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all">
                        <i class="fas fa-save mr-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
