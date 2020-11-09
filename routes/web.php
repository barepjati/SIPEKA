<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Employee\Index as EmployeeIndex;
use App\Http\Livewire\Employee\Create as EmployeeCreate;
use App\Http\Livewire\Employee\Update as EmployeeUpdate;

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

// Route::get('/', function () {
//     return view('layouts.app');
// });

Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    // Route::get('/kriteria', Kriteria::class)->name('kriteria');
    // Route::get('/alternatif', Alternatif::class)->name('alternatif');
    // Route::get('/post', Post::class)->name('post');
    Route::get('/employee', EmployeeIndex::class)->name('employee.index');
    Route::get('/employee/{id}', EmployeeUpdate::class)->name('employee.edit');
    Route::get('/employee/create', EmployeeCreate::class)->name('employee.create');
});

// Route::get('/post', ShowPosts::class);
