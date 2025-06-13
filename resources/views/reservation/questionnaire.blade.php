@extends('layouts.app')

@section('title', 'Questionnaire Reservasi - ETamu')

@section('content')
<section class="h-screen">
    <div class="reserasi-opd h-max mt-28 md:mt-36">
        <h1 class="text-2xl md:text-4xl text-center font-semibold text-gray-800 dark:text-gray-100 mb-12 md:mb-24">Questionnaire Reservasi</h1>

        <form action="{{ route('reservation.questionnaire.submit', $reservation->id) }}" method="POST" class="mx-auto">
            @csrf
            <div id="step1" class="step">
                <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 1 | Layanan penerimaan</h3>
                <label for="service_rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bagaimana penilaian anda terkait layanan kinerja petugas kami?</label>
                <input type="text" name="service_rating" id="service_rating" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('service_rating') border-red-500 @enderror" 
                    value="{{ old('service_rating') }}"
                    placeholder="Masukkan penilaian Anda"
                    required>
                @error('service_rating')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-4">
                    <p id="step1-error" class="hidden text-sm text-red-600 dark:text-red-400">Silakan isi penilaian Anda sebelum melanjutkan</p>
                    <button type="button" onclick="validateAndNextStep(1)" class="text-white bg-blue-700 hover:bg-blue-800 rounded-full px-4 py-2">Pertanyaan Selanjutnya</button>
                </div>
            </div>

            <div id="step2" class="step hidden">
                <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 2 | Kebersihan fasilitas</h3>
                <label for="facility_cleanliness" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seberapa bersih dan terawatkah fasilitas yang Anda gunakan?</label>
                <input type="text" name="facility_cleanliness" id="facility_cleanliness" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('facility_cleanliness') border-red-500 @enderror" 
                    value="{{ old('facility_cleanliness') }}"
                    placeholder="Masukkan penilaian Anda"
                    required>
                @error('facility_cleanliness')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-4">
                    <p id="step2-error" class="hidden text-sm text-red-600 dark:text-red-400">Silakan isi penilaian Anda sebelum melanjutkan</p>
                    <button type="button" onclick="validateAndNextStep(2)" class="text-white bg-blue-700 hover:bg-blue-800 rounded-full px-4 py-2">Pertanyaan Selanjutnya</button>
                </div>
            </div>

            <div id="step3" class="step hidden">
                <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 3 | Ketersediaan fasilitas</h3>
                <label for="facility_availability" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah semua fasilitas yang Anda butuhkan tersedia selama kunjungan Anda?</label>
                <input type="text" name="facility_availability" id="facility_availability" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('facility_availability') border-red-500 @enderror" 
                    value="{{ old('facility_availability') }}"
                    placeholder="Masukkan penilaian Anda"
                    required>
                @error('facility_availability')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <div class="mt-4">
                    <p id="step3-error" class="hidden text-sm text-red-600 dark:text-red-400">Silakan isi penilaian Anda sebelum melanjutkan</p>
                    <button type="button" onclick="validateAndNextStep(3)" class="text-white bg-blue-700 hover:bg-blue-800 rounded-full px-4 py-2">Pertanyaan Selanjutnya</button>
                </div>
            </div>

            <div id="step4" class="step hidden">
                <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Step 4 | Saran & umpan balik</h3>
                <label for="feedback" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apakah ada saran atau umpan balik yang ingin Anda berikan untuk meningkatkan pengalaman kami?</label>
                <textarea name="feedback" id="feedback" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('feedback') border-red-500 @enderror" required>{{ old('feedback') }}</textarea>
                @error('feedback')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <div class="flex justify-center space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="px-8 py-2 bg-red-500 text-white font-semibold rounded-full shadow-lg transition-all duration-300 ease-in-out hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300">
                        Batal
                    </button>
                    <button type="submit" class="px-8 py-2 bg-green-500 text-white font-semibold rounded-full shadow-lg transition-all duration-300 ease-in-out hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
                        Kirim Kuesioner
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function validateAndNextStep(currentStep) {
        let inputField;
        let errorElement;
        
        switch(currentStep) {
            case 1:
                inputField = document.getElementById('service_rating');
                errorElement = document.getElementById('step1-error');
                break;
            case 2:
                inputField = document.getElementById('facility_cleanliness');
                errorElement = document.getElementById('step2-error');
                break;
            case 3:
                inputField = document.getElementById('facility_availability');
                errorElement = document.getElementById('step3-error');
                break;
        }

        if (!inputField.value.trim()) {
            errorElement.classList.remove('hidden');
            inputField.classList.add('border-red-500');
            return;
        }

        errorElement.classList.add('hidden');
        inputField.classList.remove('border-red-500');
        
        document.getElementById('step' + currentStep).classList.add('hidden');
        document.getElementById('step' + (currentStep + 1)).classList.remove('hidden');
    }
</script>
@endpush
