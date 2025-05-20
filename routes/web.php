<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ComplaintController::class, 'status'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/complaints', [ComplaintController::class, 'list'])->name('complaints.new');
        Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.new');
        Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
        Route::get('/complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
        Route::get('/complaints/{complaint}/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
        Route::put('/complaints/{complaint}', [ComplaintController::class, 'update'])->name('complaints.update');

    });
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\ComplaintController::class, 'index'])->name('admin.dashboard');
    Route::get('/complaints', [App\Http\Controllers\Admin\ComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/complaints/{complaint}', [App\Http\Controllers\Admin\ComplaintController::class, 'show'])->name('complaints.show');
    Route::post('/complaints/{complaint}/response', [App\Http\Controllers\Admin\ComplaintController::class, 'respond'])->name('complaints.respond');
});


require __DIR__.'/auth.php';
