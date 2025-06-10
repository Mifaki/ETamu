<footer>
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0 text-black dark:text-white">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('assets/img/logo-diskominfo.png') }}" class="h-8 me-3" alt="Diskominfo Logo" />
                </a>
                <h4 class="mt-4 text-lg font-semibold">Diskominfo Kab.Tangerang</h4>
                <p class="mt-2">
                    Jl. Somawinata. Kel. Kadu Agung Kec. Tigaraksa <br />
                    Puspemkab Tangerang, Kabupaten Tangerang, <br />
                    Banten 15119
                </p>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div class="mx-0 md:mx-4">
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Menu</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4"><a href="{{ route(name: 'schedule') }}" class="hover:underline">Jadwal</a></li>
                        <li class="mb-4"><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
                        <li class="mb-4"><a href="{{ route(name: 'reservation.index') }}">Reservasi</a></li>
                        <li class="mb-4"><a href="{{ route('faq') }}" class="hover:underline">Faq</a></li>
                    </ul>
                </div>
                <div class="mx-0 md:mx-4">
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow Sosial Media</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4"><a href="#" class="hover:underline">Instagram</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Facebook</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Tiktok</a></li>
                    </ul>
                </div>
                <div class="mx-0 md:mx-4">
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Website</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4"><a href="#" class="hover:underline">Web 1</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Web 2</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Web 3</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Web 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="flex text-center justify-center">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                © {{ date('Y') }} <a href="https://tangerangkab.go.id/" class="hover:underline">Diskominfo Kab.Tangerang</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
