<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Karyawan\MenuController as KaryawanMenuController;
use App\Http\Controllers\Karyawan\ProfilController as KaryawanProfilController;
use App\Http\Controllers\Karyawan\PemesananController as KaryawanPemesananController;

use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\KaryawanController;
use App\Http\Controllers\Manager\MenuController;
use App\Http\Controllers\Manager\LaporanKinerjaController  as Kinerja;
use App\Http\Controllers\Manager\LaporanPenjualanController  as Penjualan;
use App\Http\Controllers\Manager\PemesananController  as Pemesanan;

use App\Http\Livewire\Order\Cart;
use App\Http\Livewire\Order\Detail;
use App\Http\Livewire\Order\Invoice;

Route::get('/', function () {
    return view('layouts.landing');
});

// Route::get('/',);

//Route sementara

Auth::routes();

// For Manager
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'manajer', 'middleware' => ['role:manajer']], function () {
        //Dashboard
        Route::get('/', DashboardController::class)->name('manajer.dashboard');

        //karyawan
        Route::resource('karyawan', KaryawanController::class);

        //Laporan Penjualan
        Route::get('laporanPenjualan', [Penjualan::class, 'index'])->name('penjualan.laporan');

        //Laporan Pemesanan
        Route::get('laporanPemesanan', [Pemesanan::class, 'index'])->name('pemesanan.laporan');

        //Laporan Kinerja
        Route::get('laporanKinerja', [Kinerja::class, 'index'])->name('kinerja.laporan');

        //Menu
        Route::resource('menuResto', MenuController::class);
        // Route::get('/menu', MenuIndex::class)->name('menu.index');


    });

    // For Employee
    Route::group(['prefix' => 'karyawan', 'middleware' => ['role:karyawan']], function () {
        //Dashboard
        Route::get('/', DashboardController::class)->name('karyawan.dashboard');

        //Profil Update pass Only
        Route::resource('profil', KaryawanProfilController::class);

        //Menu
        Route::resource('menu', KaryawanMenuController::class);

        //Pemesanan
        Route::resource('pemesanan', KaryawanPemesananController::class);
        Route::get('/cart', Cart::class)->name('cart.create');
        Route::get('/cart/{id}', Detail::class)->name('cart.detail');
        Route::get('/invoice/{id}/{uang}', Invoice::class)->name('struk');

        //Detail Transaksi
    });
});
