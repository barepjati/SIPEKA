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

use App\Http\Controllers\Karyawan\ProfilController;
use App\Http\Controllers\Manager\DashboardController;
use App\Http\Controllers\Manager\KaryawanController;
use App\Http\Controllers\Manager\MenuController;

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

        //Laporan Pemesanan

        //Menu
        Route::resource('menu', MenuController::class);
        // Route::get('/menu', MenuIndex::class)->name('menu.index');

        //Kategori
        // Route::resource('kategori', 'UserController');
        // Route::get('/category', CategoryIndex::class)->name('category.index');
    });

    // For Employee
    Route::group(['prefix' => 'karyawan', 'middleware' => ['role:karyawan']], function () {
        //Dashboard
        Route::get('/', DashboardController::class)->name('karyawan.dashboard');

        //Profil Update pass Only
        Route::resource('profil', ProfilController::class);
        // Route::get('/profil', ProfilController::class)->name('karyawan.profil');
        // Route::get('/profile', ProfileIndex::class)->name('employee.profil.index');
        // Route::get('/profile/edit', ProfileUpdate::class)->name('employee.profil.edit');

        //Menu

        //Detail Pemesanan

        //Detail Transaksi
    });
});
