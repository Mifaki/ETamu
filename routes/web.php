<?php

use App\Http\Controllers\Dashboard\RegionalDeviceController;
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
        Route::get('/', function () {
            return view('dashboard.guest-categories.index');
        })->name('dashboard.guest-categories.index');

        Route::get('/create', function () {
            return view('dashboard.guest-categories.create');
        })->name('dashboard.guest-categories.create');

        Route::post('/store', function () {
            return redirect()->route('dashboard.guest-categories.index')->with('success', 'Kategori tamu berhasil ditambahkan');
        })->name('dashboard.guest-categories.store');

        Route::get('/{id}/edit', function () {
            return view('dashboard.guest-categories.edit');
        })->name('dashboard.guest-categories.edit');

        Route::put('/{id}', function () {
            return redirect()->route('dashboard.guest-categories.index')->with('success', 'Kategori tamu berhasil diperbarui');
        })->name('dashboard.guest-categories.update');

        Route::delete('/{id}', function () {
            return redirect()->route('dashboard.guest-categories.index')->with('success', 'Kategori tamu berhasil dihapus');
        })->name('dashboard.guest-categories.destroy');
    });

    Route::prefix('/guest-purposes')->group(function () {
        Route::get('/', function () {
            return view('dashboard.guest-purposes.index');
        })->name('dashboard.guest-purposes.index');

        Route::get('/create', function () {
            return view('dashboard.guest-purposes.create');
        })->name('dashboard.guest-purposes.create');

        Route::post('/store', function () {
            return redirect()->route('dashboard.guest-purposes.index')->with('success', 'Keperluan tamu berhasil ditambahkan');
        })->name('dashboard.guest-purposes.store');

        Route::get('/{id}/edit', function () {
            return view('dashboard.guest-purposes.edit');
        })->name('dashboard.guest-purposes.edit');

        Route::put('/{id}', function () {
            return redirect()->route('dashboard.guest-purposes.index')->with('success', 'Keperluan tamu berhasil diperbarui');
        })->name('dashboard.guest-purposes.update');

        Route::delete('/{id}', function () {
            return redirect()->route('dashboard.guest-purposes.index')->with('success', 'Keperluan tamu berhasil dihapus');
        })->name('dashboard.guest-purposes.destroy');
    });

    Route::prefix('/field-purposes')->group(function () {
        Route::get('/', function () {
            return view('dashboard.field-purposes.index');
        })->name('dashboard.field-purposes.index');

        Route::get('/create', function () {
            return view('dashboard.field-purposes.create');
        })->name('dashboard.field-purposes.create');

        Route::post('/store', function () {
            return redirect()->route('dashboard.field-purposes.index')->with('success', 'Tujuan bidang berhasil ditambahkan');
        })->name('dashboard.field-purposes.store');

        Route::get('/{id}/edit', function () {
            return view('dashboard.field-purposes.edit');
        })->name('dashboard.field-purposes.edit');

        Route::put('/{id}', function () {
            return redirect()->route('dashboard.field-purposes.index')->with('success', 'Tujuan bidang berhasil diperbarui');
        })->name('dashboard.field-purposes.update');

        Route::delete('/{id}', function () {
            return redirect()->route('dashboard.field-purposes.index')->with('success', 'Tujuan bidang berhasil dihapus');
        })->name('dashboard.field-purposes.destroy');
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
