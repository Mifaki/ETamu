<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'ETamu - Diskominfo Kab. Tangerang')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>

    @stack('styles')
</head>
<body class="bg-white dark:bg-gray-700 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
    <div class="container w-[95%] md:w-[80%] mx-auto">
        @include('layouts.partials.navbar')

        <main class="w-full min-h-screen">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>

    <!-- Common Scripts -->
    @include('layouts.partials.scripts')

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
