<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\HargaPasarController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PenggunaanObatController;
use App\Http\Controllers\ManajemenPertanianController;
use App\Http\Controllers\TransaksiKeuanganController;
use App\Http\Controllers\PinjamanModalController;
use App\Http\Controllers\AsuransiPertanianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiPetaniController;

/*
|--------------------------------------------------------------------------
| Halaman Login
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Grup Route Setelah Login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | Manajemen Pasar & Harga
    |--------------------------------------------------------------------------
    */
    Route::resource('produk', PasarController::class);
    Route::resource('harga-pasar', HargaPasarController::class);

    /*
    |--------------------------------------------------------------------------
    | Manajemen Pertanian
    |--------------------------------------------------------------------------
    */
    Route::get('/manajemen-pertanian', [ManajemenPertanianController::class, 'index'])->name('manajemen.index');
    Route::resource('tanaman', TanamanController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('penggunaan-obat', PenggunaanObatController::class);

    /*
    |--------------------------------------------------------------------------
    | Keuangan, Pinjaman & Asuransi
    |--------------------------------------------------------------------------
    */
    Route::resource('transaksi-keuangan', TransaksiKeuanganController::class);
    Route::resource('pinjaman-modal', PinjamanModalController::class);
    Route::resource('asuransi', AsuransiPertanianController::class);

    /*
    |--------------------------------------------------------------------------
    | Informasi Petani (CRUD oleh Admin)
    |--------------------------------------------------------------------------
    */
    Route::prefix('informasi')->name('informasi.')->group(function () {
        Route::get('/', [InformasiPetaniController::class, 'index'])->name('index');
        Route::get('/create', [InformasiPetaniController::class, 'create'])->name('create');
        Route::post('/', [InformasiPetaniController::class, 'store'])->name('store');
        Route::get('/{id}', [InformasiPetaniController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [InformasiPetaniController::class, 'edit'])->name('edit');
        Route::put('/{id}', [InformasiPetaniController::class, 'update'])->name('update');
        Route::delete('/{id}', [InformasiPetaniController::class, 'destroy'])->name('destroy'); // ✅ Tambahkan ini
    });

    /*
    |--------------------------------------------------------------------------
    | Profil Pengguna
    |--------------------------------------------------------------------------
    */
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil.index');
});
