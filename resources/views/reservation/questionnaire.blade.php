@extends('layouts.app')

@section('title', 'Questionnaire Reservasi - ETamu')

@section('content')
<section class="h-screen">
    <div class="reserasi-opd h-max mt-28 md:mt-36">
        <h1 class="text-2xl md:text-4xl text-center font-semibold text-gray-800 dark:text-gray-100 mb-12 md:mb-24">Questionnaire Reservasi</h1>

        <div id="step1" class="step">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 1 | Layanan penerimaan</h3>
            <label for="question1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bagaimana penilaian anda terkait layanan kinerja petugas kami?</label>
            <input type="text" id="question1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
            <button onclick="nextStep(1)" class="text-white bg-blue-700 hover:bg-blue-800 rounded-full px-4 py-2 mt-4">Pertanyaan Selanjutnya</button>
        </div>

        <div id="step2" class="step hidden">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 2 | Kebersihan fasilitas</h3>
            <label for="question2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seberapa bersih dan terawatkah fasilitas yang Anda gunakan?</label>
            <input type="text" id="question2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
            <button onclick="nextStep(2)" class="text-white bg-blue-700 hover:bg-blue-800 rounded-full px-4 py-2 mt-4">Pertanyaan Selanjutnya</button>
        </div>

        <div id="step3" class="step hidden">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 3 | Ketersediaan fasilitas</h3>
            <label for="question3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah semua fasilitas yang Anda butuhkan tersedia selama kunjungan Anda?</label>
            <input type="text" id="question3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
            <button onclick="nextStep(3)" class="text-white bg-blue-700 hover:bg-blue-800 rounded-full px-4 py-2 mt-4">Pertanyaan Selanjutnya</button>
        </div>

        <div id="step4" class="step hidden">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 4 | Saran & umpan balik</h3>
            <label for="question4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah ada saran atau umpan balik yang ingin Anda berikan untuk meningkatkan pengalaman kami?</label>
            <input type="text" id="question4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
            <button onclick="submitForm()" class="text-white bg-green-700 hover:bg-green-800 rounded-full px-4 py-2 mt-4">Selesai</button>
        </div>

        <!-- Popup Box -->
        <div id="popupBox" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h3 class="text-xl font-bold mb-4 text-center">Data Anda Berhasil Terkirim !</h3>
                <p class="text-gray-600 text-center">Anda akan diarahkan ke halaman utama...</p>
                <div class="mt-4 flex justify-center">
                    <button onclick="redirectToHome()" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition duration-300">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function nextStep(currentStep) {
        document.getElementById('step' + currentStep).classList.add('hidden');
        document.getElementById('step' + (currentStep + 1)).classList.remove('hidden');
    }

    function submitForm() {
        document.getElementById('popupBox').classList.remove('hidden');
    }

    function redirectToHome() {
        window.location.href = "{{ route('reservation.index') }}";
    }
</script>
@endpush
