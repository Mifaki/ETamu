@extends('layouts.app')

@section('title', 'Buat Reservasi Baru - ETamu')

@section('content')
    <section class="mt-28 md:mt-36 mb-20 md:mb-36">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-t-lg">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Isi Form Reservasi</h2>
                </div>
                <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data"
                    class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Reservasi</label>
                        <div class="mt-2 space-y-4">
                            <div class="flex items-center">
                                <input type="radio" id="individual" name="reservation_type" value="individual"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700"
                                    {{ old('reservation_type') === 'individual' ? 'checked' : '' }}>
                                <label for="individual"
                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Perseorangan
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="organization" name="reservation_type" value="organization"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-gray-600 dark:bg-gray-700"
                                    {{ old('reservation_type') === 'organization' ? 'checked' : '' }}>
                                <label for="organization"
                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Badan Hukum/Instansi
                                </label>
                            </div>
                        </div>
                        @error('reservation_type')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="guest_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                            Tamu</label>
                        <input type="text" id="guest_name" name="guest_name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('guest_name') border-red-500 @enderror"
                            value="{{ old('guest_name') }}" required>
                        @error('guest_name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="guest_category_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori Tamu</label>
                        <select id="guest_category_id" name="guest_category_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('guest_category_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($guestCategories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('guest_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('guest_category_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="organization"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Organisasi</label>
                        <input type="text" id="organization" name="organization"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('organization') border-red-500 @enderror"
                            value="{{ old('organization') }}">
                        @error('organization')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="guest_purpose_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keperluan</label>
                        <select id="guest_purpose_id" name="guest_purpose_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('guest_purpose_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Keperluan</option>
                            @foreach ($guestPurposes as $purpose)
                                <option value="{{ $purpose->id }}"
                                    {{ old('guest_purpose_id') == $purpose->id ? 'selected' : '' }}>
                                    {{ $purpose->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('guest_purpose_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No
                            HP/Whatsapp</label>
                        <input type="text" id="phone_number" name="phone_number"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('phone_number') border-red-500 @enderror"
                            value="{{ old('phone_number') }}" required>
                        @error('phone_number')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="regional_device_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Perangkat Daerah</label>
                        <select id="regional_device_id" name="regional_device_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('regional_device_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Perangkat Daerah</option>
                            @foreach ($regionalDevices as $device)
                                <option value="{{ $device->id }}"
                                    {{ old('regional_device_id') == $device->id ? 'selected' : '' }}>
                                    {{ $device->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('regional_device_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="field_purpose_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bertemu
                            Bidang</label>
                        <select id="field_purpose_id" name="field_purpose_id"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('field_purpose_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Bidang</option>
                            @foreach ($fieldPurposes as $purpose)
                                <option value="{{ $purpose->id }}"
                                    {{ old('field_purpose_id') == $purpose->id ? 'selected' : '' }}>
                                    {{ $purpose->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('field_purpose_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                        <textarea id="address" name="address" rows="3"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('address') border-red-500 @enderror"
                            required>{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu Bertemu</label>
                        <div class="flex items-center justify-center gap-2">
                            <div class="flex-1">
                                <label for="meeting_time_start"
                                    class="block text-xs text-gray-500 dark:text-gray-400">Mulai</label>
                                <input type="datetime-local" id="meeting_time_start" name="meeting_time_start"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('meeting_time_start') border-red-500 @enderror"
                                    value="{{ old('meeting_time_start') }}" required>
                                @error('meeting_time_start')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <label for="meeting_time_end"
                                    class="block text-xs text-gray-500 dark:text-gray-400">Selesai</label>
                                <input type="datetime-local" id="meeting_time_end" name="meeting_time_end"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('meeting_time_end') border-red-500 @enderror"
                                    value="{{ old('meeting_time_end') }}" required>
                                @error('meeting_time_end')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div id="id_card_upload" class="hidden">
                        <label for="id_card" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload
                            KTP</label>
                        <input type="file" id="id_card" name="id_card"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-200 dark:hover:file:bg-gray-500 @error('id_card') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, JPEG, PNG, PDF (Maks. 3MB)
                        </p>
                        @error('id_card')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="organization_document_upload" class="hidden">
                        <label for="organization_document"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload SK Badan
                            Hukum</label>
                        <input type="file" id="organization_document" name="organization_document"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-200 dark:hover:file:bg-gray-500 @error('organization_document') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Format: JPG, JPEG, PNG, PDF (Maks. 3MB)
                        </p>
                        @error('organization_document')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 flex justify-center space-x-4 mt-6">
                        <button type="button" onclick="window.history.back()"
                            class="px-8 py-2 bg-red-500 text-white font-semibold rounded-full shadow-lg transition-all duration-300 ease-in-out hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-8 py-2 bg-green-500 text-white font-semibold rounded-full shadow-lg transition-all duration-300 ease-in-out hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
                            Ajukan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const individualRadio = document.getElementById('individual');
                const organizationRadio = document.getElementById('organization');
                const idCardUpload = document.getElementById('id_card_upload');
                const organizationDocumentUpload = document.getElementById('organization_document_upload');

                function updateUploadFields() {
                    if (individualRadio.checked) {
                        idCardUpload.classList.remove('hidden');
                        organizationDocumentUpload.classList.add('hidden');
                        document.getElementById('id_card').required = true;
                        document.getElementById('organization_document').required = false;
                    } else if (organizationRadio.checked) {
                        idCardUpload.classList.add('hidden');
                        organizationDocumentUpload.classList.remove('hidden');
                        document.getElementById('id_card').required = false;
                        document.getElementById('organization_document').required = true;
                    }
                }

                individualRadio.addEventListener('change', updateUploadFields);
                organizationRadio.addEventListener('change', updateUploadFields);

                updateUploadFields();
            });
        </script>
    @endpush

@endsection
