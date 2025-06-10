@extends('layouts.app')

@section('title', 'Buat Reservasi Baru - ETamu')

@section('content')
<section class="mt-28 md:mt-36 mb-20 md:mb-36">
    <div class="container mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-t-lg">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Isi Form</h2>
            </div>
            <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                <div>
                    <label for="nama_tamu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Tamu</label>
                    <input type="text" id="nama_tamu" name="nama_tamu" placeholder="Ahmad sanusi..." class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400">
                </div>

                <div>
                    <label for="kategori_tamu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori Tamu</label>
                    <div class="relative">
                        <select id="kategori_tamu" name="kategori_tamu" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 appearance-none pr-10">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="kategori1">Kategori 1</option>
                            <option value="kategori2">Kategori 2</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-300">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="organisasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Organisasi</label>
                    <input type="text" id="organisasi" name="organisasi" placeholder="Nama Organisasi" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400">
                </div>

                <div>
                    <label for="keperluan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keperluan</label>
                    <textarea id="keperluan" name="keperluan" rows="3" placeholder="Tuliskan keperluan anda" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400"></textarea>
                </div>

                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">No HP/Whatsapp</label>
                    <input type="text" id="no_hp" name="no_hp" placeholder="085935316990" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400">
                </div>

                <div>
                    <label for="bertemu_bidang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bertemu Bidang</label>
                    <div class="relative">
                        <select id="bertemu_bidang" name="bertemu_bidang" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 appearance-none pr-10">
                            <option value="">-- Pilih Bidang --</option>
                            <option value="bidang1">Bidang 1</option>
                            <option value="bidang2">Bidang 2</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-300">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400">
                </div>

                <div>
                    <label for="bertemu_jam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bertemu Jam</label>
                    <div class="flex space-x-2">
                        <input type="time" id="bertemu_jam_start" name="bertemu_jam_start" class="mt-1 block w-1/2 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100">
                        <input type="time" id="bertemu_jam_end" name="bertemu_jam_end" class="mt-1 block w-1/2 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100">
                    </div>
                </div>

                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" placeholder="masukan alamat anda" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:placeholder-gray-400"></textarea>
                </div>

                <div>
                    <label for="gambar_wajah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Gambar Wajah</label>
                    <input type="file" id="gambar_wajah" name="gambar_wajah" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-200 dark:hover:file:bg-gray-500">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">File format .jpg/.jpeg/.png/.pdf dan ukuran maks 3MB</p>
                </div>

                <div>
                    <label for="perangkat_daerah" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Perangkat Daerah</label>
                    <div class="relative">
                        <select id="perangkat_daerah" name="perangkat_daerah" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-100 appearance-none pr-10">
                            <option value="">-- Pilih Perangkat Daerah --</option>
                            <option value="diskominfo">Dinas Komunikasi dan Informatika</option>
                            <option value="pu">Dinas Pekerjaan Umum</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 dark:text-gray-300">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2"></div>

                <div class="md:col-span-2 flex justify-center space-x-4 mt-6">
                    <button type="button" onclick="window.history.back()" class="px-8 py-2 bg-red-500 text-white font-semibold rounded-full shadow-lg transition-all duration-300 ease-in-out hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300">Batal</button>
                    <button type="submit" class="px-8 py-2 bg-green-500 text-white font-semibold rounded-full shadow-lg transition-all duration-300 ease-in-out hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">Ajukan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
