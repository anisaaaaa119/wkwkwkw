<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\RoleMiddleware;

// 🔐 Redirect otomatis berdasarkan role
Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Routes untuk profile (user biasa & admin)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🛡️ Route khusus ADMIN
Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // 🏠 Dashboard Admin (gunakan controller)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // 📦 CRUD Barang
    Route::resource('/barang', BarangController::class)->names('barang');
});

// 👤 Route khusus USER
Route::middleware(['auth', RoleMiddleware::class . ':user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

    // 🏠 Dashboard User (langsung view)
    Route::get('/', function () {
        return view('user.dashboard');
    })->name('dashboard');
});

// 📎 Tambahan: route auth login/register/logout dari Breeze
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});
