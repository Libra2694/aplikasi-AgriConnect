<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PinjamanModalController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\ManajemenPertanianController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\ProfilController;


Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    // Ganti 'dashboard' dengan string langsung karena file berada di views/dashboard.blade.php
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
use App\Http\Controllers\LayananKeuanganController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Layanan Keuangan
    Route::resource('keuangan', LayananKeuanganController::class);
});


Route::middleware('auth')->group(function () {
    Route::resource('pinjaman', PinjamanModalController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/asuransi', [AsuransiController::class, 'index'])->name('asuransi.index');
});

Route::get('/asuransi', [AsuransiController::class, 'index'])->name('asuransi.index');
Route::get('/asuransi/create', [AsuransiController::class, 'create'])->name('asuransi.create');
Route::post('/asuransi', [AsuransiController::class, 'store'])->name('asuransi.store');
Route::delete('/asuransi/{id}', [AsuransiController::class, 'destroy'])->name('asuransi.destroy');

Route::middleware(['auth'])->group(function () {
    Route::resource('pertanian', ManajemenPertanianController::class);
});
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

