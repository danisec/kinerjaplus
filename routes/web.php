<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PerhitunganKriteriaController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('home.index')->middleware('guest');

Route::controller(LoginController::class)->name('login.')->group(function () {
    Route::get('/login', 'index')->name('index')->middleware('guest');
    Route::post('/login', 'store')->name('store')->middleware('guest');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::controller(RegisterController::class)->name('register.')->middleware('guest')->group(function () {
    Route::get('/register', 'index')->name('index');
    Route::post('/register', 'store')->name('store');
});

Route::controller(DashboardController::class)->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::post('/dashboard', 'store')->name('store');
});

Route::controller(KriteriaController::class)->name('kriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-kriteria', 'index')->name('index');
    Route::get('/dashboard/data-kriteria/view-kriteria/{id}', 'show')->name('show');

    Route::get('/dashboard/data-kriteria/tambah-kriteria', 'create')->name('create');
    Route::post('/dashboard/data-kriteria', 'store')->name('store');

    Route::get('/dashboard/data-kriteria/ubah-kriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-kriteria/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-kriteria/{id}', 'destroy')->name('destroy');
});

Route::controller(AlternatifController::class)->name('alternatif.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-alternatif', 'index')->name('index');
    Route::get('/dashboard/data-alternatif/view-alternatif/{id}', 'show')->name('show');

    Route::get('/dashboard/data-alternatif/tambah-alternatif', 'create')->name('create');
    Route::post('/dashboard/data-alternatif', 'store')->name('store');

    Route::get('/dashboard/data-alternatif/ubah-alternatif/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-alternatif/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-alternatif/{id}', 'destroy')->name('destroy');
});

Route::controller(PerhitunganKriteriaController::class)->name('perhitunganKriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perhitungan-perbandingan-kriteria', 'index')->name('index');
    Route::get('/dashboard/perhitungan-perbandingan-kriteria/hasil-perbandingan-kriteria', 'hasil')->name('hasil');

    Route::post('/dashboard/perhitungan-perbandingan-kriteria', 'store')->name('store');
});
