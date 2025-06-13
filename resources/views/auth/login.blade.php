<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        .bg-login {
            background-image: url("{{ asset('assets/img/bg-login.png') }}");
        }
    </style>
</head>

<body class="bg-login bg-no-repeat bg-cover flex items-center justify-center min-h-screen">
    <div class="bg-white bg-opacity-80 rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Login</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 @error('email') border-red-500 @enderror"
                    placeholder="masukanemail@gmail.com" required />
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500 p-2 @error('password') border-red-500 @enderror"
                    placeholder="********" required />
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold rounded-md p-2 hover:bg-blue-700 transition duration-200 mb-3">
                Login
            </button>
            <a href="{{ route('home') }}"
                class="w-full bg-green-600 text-white font-semibold rounded-md p-2 hover:bg-green-700 transition duration-200 block text-center">
                Halaman Utama
            </a>
        </form>
    </div>
</body>

</html>
