@extends('layouts.dashboard')

@section('title', 'Edit Pengguna - Dashboard')

<?php
    $user = [
        'id'       => 1,
        'nama'     => 'Samsul Bahari',
        'email'    => 'adminopd1@opd.com',
        'username' => 'adminopd1',
        'jabatan'  => 'Admin OPD',
    ];
?>

@section('content')
<div class="flex items-center justify-center h-full">
    <div
        class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-lg w-full"
    >
        <h1
            class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 dark:text-white mb-8"
        >
            Edit Pengguna
        </h1>

        <form action="{{ route('dashboard.users.update', ['id' => $user['id']]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200" for="name"
                    >Nama</label
                >
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-700 p-2"
                    placeholder="Masukkan nama"
                    value="{{ $user['nama'] ?? '' }}"
                    required
                />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200" for="email"
                    >Email</label
                >
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-700 p-2"
                    placeholder="Masukkan email"
                    value="{{ $user['email'] ?? '' }}"
                    required
                />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200" for="username"
                    >Username</label
                >
                <input
                    type="text"
                    id="username"
                    name="username"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-700 p-2"
                    placeholder="Masukkan username"
                    value="{{ $user['username'] ?? '' }}"
                    required
                />
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-200" for="role"
                    >Jabatan</label
                >
                <input
                    type="text"
                    id="jabatan"
                    name="jabatan"
                    class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-700 p-2"
                    placeholder="Masukkan jabatan"
                    value="{{ $user['jabatan'] ?? '' }}"
                    required
                />
            </div>
            <div class="flex justify-end">
                <button
                    type="button"
                    onclick="window.history.back()"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition-all mr-3"
                >
                    Batal
                </button>
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
