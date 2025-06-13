@extends('layouts.dashboard')

@section('title', 'Kuesioner - Dashboard')

@section('content')
    <h1 class="text-3xl md:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-10">
        Kuesioner
    </h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @include('components.dashboard.dash-table', [
        'headers' => ['Nama Tamu', 'Rating Layanan', 'Kebersihan', 'Ketersediaan', 'Feedback', 'Aksi'],
        'data' => $questionnaires->map(function ($questionnaire) {
            return [
                'nama_tamu' => $questionnaire->reservation->guest_name,
                'rating_layanan' => $questionnaire->service_rating,
                'kebersihan' => $questionnaire->facility_cleanliness,
                'ketersediaan' => $questionnaire->facility_availability,
                'feedback' => Str::limit($questionnaire->feedback, 50),
                'id' => $questionnaire->id,
            ];
        }),
        'actions' => function ($row) {
            return '<a href="' . 
                route('dashboard.questionnaire.show', $row['id']) . 
                '" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-all">
                    Detail
                </a>
                <form action="' . 
                route('dashboard.questionnaire.destroy', $row['id']) . 
                '" method="POST" class="inline-block" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus kuesioner ini?\');">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-all">
                    Hapus
                </button>
                </form>';
        },
    ])

    <div class="mt-4">
        {{ $questionnaires->links('pagination::tailwind') }}
    </div>
@endsection