<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Middleware\RoleMiddleware;

// 👉 Redirect berdasarkan role
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return redirect('/user');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Routes untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🛡️ Group route khusus admin
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // ✅ Resource untuk barang, route jadi: admin.barang.index, admin.barang.create, dll.
    Route::resource('/barang', BarangController::class)->names('barang');
});

// 👤 Group route khusus user
Route::middleware(['auth', RoleMiddleware::class . ':user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
