<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganAlternatifController;
use App\Http\Controllers\PerhitunganKriteriaController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubkriteriaController;
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

Route::controller(DashboardController::class)->name('dashboard.')->middleware('auth', 'user-role:manajer,pimpinan,guru')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::post('/dashboard', 'store')->name('store');
});

Route::controller(AlternatifController::class)->name('alternatif.')->middleware('auth', 'user-role:manajer')->group(function () {
    Route::get('/dashboard/data-alternatif', 'index')->name('index');
    Route::get('/dashboard/data-alternatif/view-alternatif/{id}', 'show')->name('show');

    Route::get('/dashboard/data-alternatif/tambah-alternatif', 'create')->name('create');
    Route::post('/dashboard/data-alternatif', 'store')->name('store');

    Route::get('/dashboard/data-alternatif/ubah-alternatif/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-alternatif/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-alternatif/{id}', 'destroy')->name('destroy');
});

Route::controller(KriteriaController::class)->name('kriteria.')->middleware('auth', 'user-role:manajer')->group(function () {
    Route::get('/dashboard/data-kriteria', 'index')->name('index');
    Route::get('/dashboard/data-kriteria/view-kriteria/{id}', 'show')->name('show');

    Route::get('/dashboard/data-kriteria/tambah-kriteria', 'create')->name('create');
    Route::post('/dashboard/data-kriteria', 'store')->name('store');

    Route::get('/dashboard/data-kriteria/ubah-kriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-kriteria/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-kriteria/{id}', 'destroy')->name('destroy');
});

Route::controller(SubkriteriaController::class)->name('subkriteria.')->middleware('auth', 'user-role:manajer')->group(function () {
    Route::get('/dashboard/data-subkriteria', 'index')->name('index');
    Route::get('/dashboard/data-subkriteria/view-subkriteria/{id}', 'show')->name('show');

    Route::get('/dashboard/data-subkriteria/tambah-subkriteria', 'create')->name('create');
    Route::post('/dashboard/data-subkriteria', 'store')->name('store');

    Route::get('/dashboard/data-subkriteria/ubah-subkriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-subkriteria/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-subkriteria/{id}', 'destroy')->name('destroy');
});

Route::controller(PenilaianController::class)->name('penilaian.')->middleware('auth', 'user-role:manajer,pimpinan,guru')->group(function () {
    Route::get('/dashboard/data-penilaian', 'index')->name('index');
    Route::get('/dashboard/data-penilaian/view-penilaian/{id}', 'show')->name('show');

    Route::get('/dashboard/data-penilaian/tambah-penilaian', 'create')->name('create');
    Route::post('/dashboard/data-penilaian', 'store')->name('store');

    Route::get('/dashboard/data-penilaian/ubah-penilaian/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-penilaian/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-penilaian/{id}', 'destroy')->name('destroy');
});

Route::controller(PerhitunganKriteriaController::class)->name('perhitunganKriteria.')->middleware('auth', 'user-role:manajer')->group(function () {
    Route::get('/dashboard/perhitungan-perbandingan-kriteria', 'index')->name('index');
    Route::get('/dashboard/perhitungan-perbandingan-kriteria/hasil-perbandingan-kriteria', 'hasil')->name('hasil');

    Route::post('/dashboard/perhitungan-perbandingan-kriteria', 'store')->name('store');
});

Route::controller(PerhitunganAlternatifController::class)->name('perhitunganAlternatif.')->middleware('auth', 'user-role:manajer')->group(function () {
    Route::get('/dashboard/perhitungan-perbandingan-alternatif', 'index')->name('index');
    Route::get('/dashboard/perhitungan-perbandingan-alternatif/hasil-perbandingan-alternatif', 'hasil')->name('hasil');

    Route::post('/dashboard/perhitungan-perbandingan-alternatif', 'store')->name('store');
});

Route::controller(RankingController::class)->name('ranking.')->middleware('auth', 'user-role:manajer')->group(function () {
    Route::get('/dashboard/perankingan', 'index')->name('index');
    Route::post('/dashboard/perankingan', 'store')->name('store');
});
