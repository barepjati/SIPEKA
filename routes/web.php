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
use App\Http\Controllers\Karyawan\ReservasiController;
use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\KaryawanController;
use App\Http\Controllers\Manager\MenuController;
use App\Http\Controllers\Manager\LaporanKinerjaController  as Kinerja;
use App\Http\Controllers\Manager\LaporanPenjualanController  as Penjualan;
use App\Http\Controllers\Manager\MejaController;
use App\Http\Controllers\Manager\PemesananController  as Pemesanan;

use App\Http\Controllers\Pelanggan\PemesananController as Pesan;
use App\Http\Controllers\Pelanggan\ProfilController;
use App\Http\Controllers\Pelanggan\ReservasiController as PelangganReservasiController;
use App\Http\Livewire\Order\Cart;
use App\Http\Livewire\Order\Detail;
use App\Http\Livewire\Order\Invoice;
use App\Http\Livewire\Profile\Address;

use App\Http\Livewire\Reservasi\Index;

Route::get('/', function () {
    return view('layouts.landing');
});

// Route::get('/',);

//Route sementara

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    // For Manager
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

        //Meja
        Route::get('/meja', MejaController::class)->name('meja.index');
        Route::get('/meja/create', [MejaController::class, 'create'])->name('meja.create');

        //Reservasi
        // Route::get('/reservasi', Index::class)->name('reservasi.index');
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
        Route::put('pemesanan/proses/{id}', [KaryawanPemesananController::class, 'proses'])->name('update.proses');
        Route::put('pemesanan/kirim/{id}', [KaryawanPemesananController::class, 'kirim'])->name('update.kirim');
        Route::get('/cart', Cart::class)->name('cart.create');
        Route::get('/cart/{id}', Detail::class)->name('cart.detail');
        Route::get('/invoice/{id}/{uang}', Invoice::class)->name('struk');

        //reservasi
        Route::get('/reservasi', ReservasiController::class)->name('reservasi.index');
        Route::get('/reservasi/detail/{id}', [ReservasiController::class, 'detail'])->name('reservasi.detail');
    });

    Route::group(['prefix' => 'pelanggan', 'middleware' => ['role:pelanggan']], function () {
        Route::get('/', DashboardController::class)->name('pelanggan.dashboard');

        //Pemesanan
        Route::get('/cart', Cart::class)->name('pesan.create');
        Route::get('/history', [Pesan::class, 'history'])->name('pesan.history');
        Route::get('/pesanan/{id}', Detail::class)->name('pesan.detail');

        //Reservasi
        Route::get('/reservasi', PelangganReservasiController::class)->name('pelanggan.reservasi');
        Route::get('/reservasi/create', [PelangganReservasiController::class, 'create'])->name('pelanggan.reservasi.create');
        Route::get('/reservasi/detail/{id}', [PelangganReservasiController::class, 'detail'])->name('pelanggan.reservasi.detail');

        // Profil
        Route::get('/profil', [ProfilController::class, 'index'])->name('pelanggan.profil');
        Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('pelanggan.edit');
        Route::get('/alamat/edit', Address::class)->name('pelanggan.alamat');
    });
});
