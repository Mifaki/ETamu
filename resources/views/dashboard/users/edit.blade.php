@extends('layouts.dashboard')

@section('title', 'Edit User - Dashboard')

@section('content')
    <div class="flex items-center justify-center h-full">
        <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md max-w-lg w-full">
            <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 dark:text-white mb-8">
                Edit User
            </h1>

            <form action="{{ route('dashboard.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200" for="name">
                        Nama
                    </label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('name') border-red-500 @enderror"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('email') border-red-500 @enderror"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200" for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('password') border-red-500 @enderror"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200" for="password_confirmation">
                        Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200" for="role">
                        Role
                    </label>
                    <select name="role" id="role"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('role') border-red-500 @enderror"
                        required>
                        <option value="">Pilih Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" 
                                {{ (old('role', $user->roles->first()?->name) == $role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('dashboard.users.index') }}"
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
