<?php

use App\Http\Controllers\Dashboard\FieldPurposeController;
use App\Http\Controllers\Dashboard\GuestCategoryController;
use App\Http\Controllers\Dashboard\GuestPurposeController;
use App\Http\Controllers\Dashboard\RegionalDeviceController;
use App\Http\Controllers\ReservationController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::prefix('reservation')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])
        ->name('reservation.index');

    Route::get('/create', [ReservationController::class, 'create'])
        ->name('reservation.create');

    Route::post('/store', [ReservationController::class, 'store'])
        ->name('reservation.store');

    Route::get('/{id}', [ReservationController::class, 'show'])
        ->name('reservation.show');

    Route::get('/{id}/questionnaire', [ReservationController::class, 'questionnaire'])
        ->name('reservation.questionnaire');

    Route::post('/{id}/questionnaire', function ($id) {
    })->name('reservation.questionnaire.submit');
});

Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard.index');

    Route::prefix('/user')->group(function () {
        Route::get('/', function () {
            return view('dashboard.users.index');
        })->name('dashboard.users.index');

        Route::get('/create', function () {
            return view('dashboard.users.create');
        })->name('dashboard.users.create');

        Route::get('/{id}/edit', function () {
            return view('dashboard.users.edit');
        })->name('dashboard.users.edit');

        Route::post('/store', function () {
            return redirect()->route('dashboard.users.index')->with('success', 'User created successfully');
        })->name('dashboard.users.store');

        Route::put('/update', function () {
            return redirect()->route('dashboard.users.index')->with('success', 'User edited successfully');
        })->name('dashboard.users.update');

        Route::delete('/delete', function () {
            return redirect()->route('dashboard.users.index')->with('success', 'User deleted successfully');
        })->name('dashboard.users.destroy');
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
        Route::get('/', function () {
            return view('dashboard.questionnaire.index');
        })->name('dashboard.questionnaire.index');

        Route::get('/{id}', function () {
            return view('dashboard.questionnaire.show');
        })->name('dashboard.questionnaire.show');

        Route::delete('/{id}', function () {
            return redirect()->route('dashboard.questionnaire.index')->with('success', 'Data kuesioner berhasil dihapus');
        })->name('dashboard.questionnaire.destroy');
    });

    Route::prefix('/guest')->group(function () {
        Route::get('/', function () {
            return view('dashboard.guest.index');
        })->name('dashboard.guest.index');

        Route::get('/{id}', function () {
            return view('dashboard.guest.show');
        })->name('dashboard.guest.show');

        Route::delete('/{id}', function () {
            return redirect()->route('dashboard.guest.index')->with('success', 'Data tamu berhasil dihapus');
        })->name('dashboard.guest.destroy');
    });
});
