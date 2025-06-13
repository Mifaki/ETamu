@extends('layouts.app')

@section('title', 'Login Required - ETamu')

@section('content')
    <section>
        <div class="reserasi-index h-screen mt-28 md:mt-36">
            <img class="w-[50%px] md:w-[60%] mx-auto" src="./assets/img/login-reservasi.png" alt="gambar login" />
            <p class="text-lg text-black dark:text-white md:text-xl text-center mt-3 md:mt-7">
                Anda belum login, silahkan
                <a href={{ route('login') }} class="text-blue-600 font-semibold">Login</a>
                terlebih dahulu
            </p>
        </div>
    </section>
@endsection