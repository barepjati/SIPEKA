<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Employee\Index as EmployeeIndex;
use App\Http\Livewire\Employee\Create as EmployeeCreate;
use App\Http\Livewire\Employee\Update as EmployeeUpdate;
use App\Http\Livewire\Profile\Index as ProfileIndex;
use App\Http\Livewire\Profile\Update as ProfileUpdate;

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

Route::get('/', function () {
    return view('layouts.landing');
});

//Route sementara

Auth::routes();

// For Manager
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'manager', 'middleware' => ['role:manager']], function () {
        Route::get('/', Dashboard::class)->name('manager.dashboard');
        Route::get('/employee', EmployeeIndex::class)->name('employee.index');
        Route::get('/employee/edit/{id}', EmployeeUpdate::class)->name('employee.edit');
        Route::get('/employee/create', EmployeeCreate::class)->name('employee.create');
    });

    // For Employee
    Route::group(['prefix' => 'employee', 'middleware' => ['role:employee']], function () {
        Route::get('/', Dashboard::class)->name('employee.dashboard');
        Route::get('/profile', ProfileIndex::class)->name('employee.profil.index');
        Route::get('/profile/edit', ProfileUpdate::class)->name('employee.profil.edit');
    });
});
