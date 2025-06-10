<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/schedule', function () {
    return view('schedule');
})->name('schedule');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::prefix('reservation')->group(function () {
    Route::get('/', function () {
        return view('reservation.index');
    })->name('reservation.index');

    Route::get('/create', function () {
        return view('reservation.create');
    })->name('reservation.create');

    Route::post('/store', function () {
        return redirect()->route('reservation.index')->with('success', 'Reservation created successfully');
    })->name('reservation.store');

    Route::get('/{id}', function ($id) {
        return view('reservation.show', ['id' => $id]);
    })->name('reservation.show');

    Route::get('/{id}/questionnaire', function ($id) {
        return view('reservation.questionnaire', ['id' => $id]);
    })->name('reservation.questionnaire');

    Route::post('/{id}/questionnaire', function ($id) {
    })->name('reservation.questionnaire.submit');
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
});
