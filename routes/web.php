<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PinjamanModalController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\ManajemenPertanianController;


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
