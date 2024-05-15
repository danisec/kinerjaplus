<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\GroupKaryawanController;
use App\Http\Controllers\GroupPenilaianController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiSkalaController;
use App\Http\Controllers\SkalaIndikatorController;
use App\Http\Controllers\SubkriteriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AlternatifController::class)->name('alternatif.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-alternatif', 'index')->name('index');
    Route::get('/dashboard/data-alternatif/view-alternatif/{id}', 'show')->name('show');

    Route::get('/dashboard/data-alternatif/tambah-alternatif', 'create')->name('create');
    Route::post('/dashboard/data-alternatif', 'store')->name('store');

    Route::get('/dashboard/data-alternatif/ubah-alternatif/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-alternatif/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-alternatif/{id}', 'destroy')->name('destroy');
});

Route::controller(GroupKaryawanController::class)->name('groupKaryawan.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-group-alternatif', 'index')->name('index');
    Route::get('/dashboard/data-group-alternatif/view-group-alternatif/{id}', 'show')->name('show');

    Route::get('/dashboard/data-group-alternatif/tambah-group-alternatif', 'create')->name('create');
    Route::post('/dashboard/data-group-alternatif', 'store')->name('store');

    Route::get('/dashboard/data-group-alternatif/ubah-group-alternatif/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-group-alternatif/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-group-alternatif/{id}', 'destroy')->name('destroy');

    Route::get('/dashboard/data-group-alternatif/ubah-group-alternatif/{idGroupKaryawan}/getAlternatif', 'getAlternatif')->name('getAlternatif');
});

Route::controller(GroupPenilaianController::class)->name('groupPenilaian.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-group-alternatif/group-penilaian/{id}', 'create')->name('create');
    Route::post('/dashboard/data-group-alternatif/group-penilaian/{id}', 'store')->name('store');

    Route::get('/dashboard/data-group-alternatif/group-penilaian/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-group-alternatif/group-penilaian/{id}/edit', 'update')->name('update');
});

Route::controller(KriteriaController::class)->name('kriteria.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-kriteria', 'index')->name('index');
    Route::get('/dashboard/data-kriteria/view-kriteria/{id}', 'show')->name('show');

    Route::get('/dashboard/data-kriteria/tambah-kriteria', 'create')->name('create');
    Route::post('/dashboard/data-kriteria', 'store')->name('store');

    Route::get('/dashboard/data-kriteria/ubah-kriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-kriteria/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-kriteria/{id}', 'destroy')->name('destroy');
});

Route::controller(SubkriteriaController::class)->name('subkriteria.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-subkriteria', 'index')->name('index');
    Route::get('/dashboard/data-subkriteria/view-subkriteria/{id}', 'show')->name('show');

    Route::get('/dashboard/data-subkriteria/tambah-subkriteria', 'create')->name('create');
    Route::post('/dashboard/data-subkriteria', 'store')->name('store');

    Route::get('/dashboard/data-subkriteria/ubah-subkriteria/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-subkriteria/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-subkriteria/{id}', 'destroy')->name('destroy');

    Route::get('/dashboard/data-subkriteria/tambah-subkriteria/get-new-code-subkriteria', 'getnewCodeSubkriteria')->name('getnewCodeSubkriteria');
});

Route::controller(SkalaIndikatorController::class)->name('skalaIndikator.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-skala-indikator', 'index')->name('index');
    Route::get('/dashboard/data-skala-indikator/view-skala-indikator/{id}', 'show')->name('show');

    Route::get('/dashboard/data-skala-indikator/tambah-skala-indikator', 'create')->name('create');
    Route::post('/dashboard/data-skala-indikator', 'store')->name('store');

    Route::get('/dashboard/data-skala-indikator/ubah-skala-indikator/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-skala-indikator/{id}', 'update')->name('update');

    Route::delete('/dashboard/data-skala-indikator/{id}', 'destroy')->name('destroy');

    Route::get('/dashboard/data-skala-indikator/tambah-skala-indikator/{kodeSubkriteria}/getIndikatorSubkriteria', 'getIndikatorSubkriteria')->name('getIndikatorSubkriteria');
});

Route::controller(NilaiSkalaController::class)->name('nilaiSkala.')->middleware('auth', 'user-role:superadmin,admin')->group(function () {
    Route::get('/dashboard/data-skala-indikator/tambah-nilai-skala', 'create')->name('create');
    Route::post('/dashboard/data-skala-indikator/tambah-nilai-skala', 'store')->name('store');

    Route::get('/dashboard/data-skala-indikator/ubah-nilai-skala/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-skala-indikator/ubah-nilai-skala/edit', 'update')->name('update');
});