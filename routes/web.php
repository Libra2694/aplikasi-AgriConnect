<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\ProfilController;

Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    // Ganti 'dashboard' dengan string langsung karena file berada di views/dashboard.blade.php
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/komunitas', [KomunitasController::class, 'index'])->name('komunitas.index');
Route::get('/komunitas/{id}', [KomunitasController::class, 'show'])->name('komunitas.show');
Route::post('/komunitas/{id}/komentar', [KomunitasController::class, 'komentar'])->name('komunitas.komentar');
Route::get('/komunitas/buat', [KomunitasController::class, 'create'])->name('komunitas.create');
Route::post('/komunitas', [KomunitasController::class, 'store'])->name('komunitas.store');
    
Route::middleware(['auth'])->prefix('profil')->name('profil.')->group(function () {
    Route::get('/', [ProfilController::class, 'index'])->name('index');
    Route::get('/topik', [ProfilController::class, 'topik'])->name('topik');
    Route::get('/komentar', [ProfilController::class, 'komentar'])->name('komentar');
    Route::get('/edit', [ProfilController::class, 'edit'])->name('edit');
    Route::post('/update', [ProfilController::class, 'update'])->name('update');
});

// routes/web.php
Route::get('/pasar-hasil-tani', function () {
    return view('pasar.index');
})->name('pasar.index');
