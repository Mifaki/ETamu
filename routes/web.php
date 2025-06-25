<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FieldPurposeController;
use App\Http\Controllers\Dashboard\GuestCategoryController;
use App\Http\Controllers\Dashboard\GuestController;
use App\Http\Controllers\Dashboard\GuestPurposeController;
use App\Http\Controllers\Dashboard\QuestionnaireController;
use App\Http\Controllers\Dashboard\RegionalDeviceController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('reservation')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])
        ->name('reservation.index');

    Route::get('/create', [ReservationController::class, 'create'])
        ->name('reservation.create');

    Route::post('/store', [ReservationController::class, 'store'])
        ->name('reservation.store');

    Route::post('/lookup', [ReservationController::class, 'lookup'])
        ->name('reservation.lookup');

    Route::post('/checkin', [ReservationController::class, 'checkIn'])
        ->name('reservation.checkin');

    Route::get('/{id}', [ReservationController::class, 'show'])
        ->name('reservation.show');

    Route::get('/{id}/questionnaire', [ReservationController::class, 'questionnaire'])
        ->name('reservation.questionnaire');

    Route::post('/{id}/questionnaire', [ReservationController::class, 'submitQuestionnaire'])
        ->name('reservation.questionnaire.submit');
});

Route::prefix('/dashboard')->middleware(['auth', 'dashboard.access'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    Route::prefix('/user')->middleware('super.admin')->group(function () {
        Route::get('/', [UserController::class, 'index'])
            ->name('dashboard.users.index');

        Route::get('/create', [UserController::class, 'create'])
            ->name('dashboard.users.create');

        Route::post('/store', [UserController::class, 'store'])
            ->name('dashboard.users.store');

        Route::get('/{user}/edit', [UserController::class, 'edit'])
            ->name('dashboard.users.edit');

        Route::put('/{user}', [UserController::class, 'update'])
            ->name('dashboard.users.update');

        Route::delete('/{user}', [UserController::class, 'destroy'])
            ->name('dashboard.users.destroy');
    });

    Route::prefix('/regional-devices')->group(function () {
        Route::get('/', [RegionalDeviceController::class, 'index'])
            ->name('dashboard.regional-devices.index');

        Route::get('/create', [RegionalDeviceController::class, 'create'])
            ->name('dashboard.regional-devices.create');

        Route::post('/store', [RegionalDeviceController::class, 'store'])
            ->name('dashboard.regional-devices.store');

        Route::get('/{regionalDevice}/edit', [RegionalDeviceController::class, 'edit'])
            ->name('dashboard.regional-devices.edit');

        Route::put('/{regionalDevice}', [RegionalDeviceController::class, 'update'])
            ->name('dashboard.regional-devices.update');

        Route::delete('/{regionalDevice}', [RegionalDeviceController::class, 'destroy'])
            ->name('dashboard.regional-devices.destroy');
    });

    Route::prefix('/guest-categories')->group(function () {
        Route::get('/', [GuestCategoryController::class, 'index'])
            ->name('dashboard.guest-categories.index');

        Route::get('/create', [GuestCategoryController::class, 'create'])
            ->name('dashboard.guest-categories.create');

        Route::post('/store', [GuestCategoryController::class, 'store'])
            ->name('dashboard.guest-categories.store');

        Route::get('/{guestCategory}/edit', [GuestCategoryController::class, 'edit'])
            ->name('dashboard.guest-categories.edit');

        Route::put('/{guestCategory}', [GuestCategoryController::class, 'update'])
            ->name('dashboard.guest-categories.update');

        Route::delete('/{guestCategory}', [GuestCategoryController::class, 'destroy'])
            ->name('dashboard.guest-categories.destroy');
    });

    Route::prefix('/guest-purposes')->group(function () {
        Route::get('/', [GuestPurposeController::class, 'index'])
            ->name('dashboard.guest-purposes.index');

        Route::get('/create', [GuestPurposeController::class, 'create'])
            ->name('dashboard.guest-purposes.create');

        Route::post('/store', [GuestPurposeController::class, 'store'])
            ->name('dashboard.guest-purposes.store');

        Route::get('/{guestPurpose}/edit', [GuestPurposeController::class, 'edit'])
            ->name('dashboard.guest-purposes.edit');

        Route::put('/{guestPurpose}', [GuestPurposeController::class, 'update'])
            ->name('dashboard.guest-purposes.update');

        Route::delete('/{guestPurpose}', [GuestPurposeController::class, 'destroy'])
            ->name('dashboard.guest-purposes.destroy');
    });

    Route::prefix('/field-purposes')->group(function () {
        Route::get('/', [FieldPurposeController::class, 'index'])
            ->name('dashboard.field-purposes.index');

        Route::get('/create', [FieldPurposeController::class, 'create'])
            ->name('dashboard.field-purposes.create');

        Route::post('/store', [FieldPurposeController::class, 'store'])
            ->name('dashboard.field-purposes.store');

        Route::get('/{fieldPurpose}/edit', [FieldPurposeController::class, 'edit'])
            ->name('dashboard.field-purposes.edit');

        Route::put('/{fieldPurpose}', [FieldPurposeController::class, 'update'])
            ->name('dashboard.field-purposes.update');

        Route::delete('/{fieldPurpose}', [FieldPurposeController::class, 'destroy'])
            ->name('dashboard.field-purposes.destroy');
    });

    Route::prefix('/questionnaire')->group(function () {
        Route::get('/', [QuestionnaireController::class, 'index'])
            ->name('dashboard.questionnaire.index');

        Route::get('/{id}', [QuestionnaireController::class, 'show'])
            ->name('dashboard.questionnaire.show');

        Route::delete('/{id}', [QuestionnaireController::class, 'destroy'])
            ->name('dashboard.questionnaire.destroy');
    });

    Route::prefix('/guest')->group(function () {
        Route::get('/', [GuestController::class, 'index'])
            ->name('dashboard.guest.index');

        Route::get('/{id}', [GuestController::class, 'show'])
            ->name('dashboard.guest.show');

        Route::patch('/{id}/approve', [GuestController::class, 'approve'])
            ->name('dashboard.guest.approve');

        Route::patch('/{id}/reject', [GuestController::class, 'reject'])
            ->name('dashboard.guest.reject');

        Route::patch('/{id}/complete', [GuestController::class, 'complete'])
            ->name('dashboard.guest.complete');

        Route::delete('/{id}', [GuestController::class, 'destroy'])
            ->name('dashboard.guest.destroy');
    });
});