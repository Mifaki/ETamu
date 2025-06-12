@extends('layouts.app')

@section('title', 'Detail Reservasi - ETamu')

@section('content')
    <section>
        <div class="container mx-auto px-4 py-8 mt-12 md:mt-24">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100">
                    Detail Reservasi
                </h1>
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
        ($reservation->status === 'approved' ? 'bg-green-100 text-green-800' :
            ($reservation->status === 'rejected' ? 'bg-red-100 text-red-800' :
                'bg-gray-100 text-gray-800')) }}">
                    {{ ucfirst($reservation->status) }}
                </span>
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-md shadow-md mb-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <tbody>
                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Nama Tamu
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->guest_name }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Kategori Tamu
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->guestCategory?->name ?? '-' }}
                                </td>
                            </tr>

                            @if($reservation->photo_path)
                                <tr class="border-b border-gray-300 dark:border-gray-700">
                                    <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                        Foto Tamu
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ Storage::url($reservation->photo_path) }}" alt="Foto Tamu"
                                            class="w-32 h-32 rounded-md shadow-md" />
                                    </td>
                                </tr>
                            @endif

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Organisasi
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->organization ?? '-' }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Tujuan Kunjungan
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->guestPurpose?->name ?? '-' }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    No HP/Whatsapp
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->phone_number }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Lokasi Pertemuan
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->fieldPurpose?->name ?? '-' }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Email
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->email }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Waktu Pertemuan
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->meeting_time_start?->format('d F Y H:i') ?? '-' }} -
                                    {{ $reservation->meeting_time_end?->format('H:i') ?? '-' }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Alamat
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->address }}
                                </td>
                            </tr>

                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                    Tipe Reservasi
                                </th>
                                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                    {{ $reservation->reservation_type === 'individual' ? 'Perseorangan' : 'Badan Hukum/Instansi' }}
                                </td>
                            </tr>

                            @if($reservation->id_card_path)
                                <tr class="border-b border-gray-300 dark:border-gray-700">
                                    <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                        KTP
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="{{ Storage::url($reservation->id_card_path) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                            Lihat KTP
                                        </a>
                                    </td>
                                </tr>
                            @endif

                            @if($reservation->organization_document_path)
                                <tr class="border-b border-gray-300 dark:border-gray-700">
                                    <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                        SK Badan Hukum
                                    </th>
                                    <td class="px-6 py-4">
                                        <a href="{{ Storage::url($reservation->organization_document_path) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                            Lihat SK Badan Hukum
                                        </a>
                                    </td>
                                </tr>
                            @endif

                            @if($reservation->notes)
                                <tr class="border-b border-gray-300 dark:border-gray-700">
                                    <th class="px-6 py-4 text-left font-medium text-gray-800 dark:text-gray-100">
                                        Catatan
                                    </th>
                                    <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                        {{ $reservation->notes }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 flex justify-between">
                <a href="{{ route('reservation.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Kembali
                </a>

                @if($reservation->status === 'pending')
                    <a href="{{ route('reservation.questionnaire', $reservation) }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Isi Kuesioner
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection