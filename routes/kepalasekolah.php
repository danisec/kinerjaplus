<?php

use App\Http\Controllers\CatatanKaryawanController;
use App\Http\Controllers\PerhitunganAlternatifController;
use App\Http\Controllers\PersetujuanPenilaianController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Kepala Sekolah Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PersetujuanPenilaianController::class)->name('persetujuanPenilaian.')->middleware('auth', 'user-role:kepala sekolah')->group(function () {
    Route::get('/dashboard/persetujuan-penilaian', 'index')->name('index');
    Route::get('/dashboard/persetujuan-penilaian/view-penilaian/{id}', 'show')->name('show');
    
    Route::get('/dashboard/persetujuan-penilaian/{firstYear}/{secondYear}', 'showTahun')->name('showTahun');
    Route::put('/dashboard/persetujuan-penilaian/{id}', 'update')->name('update');
    
    Route::get('/dashboard/persetujuan-penilaian/{firstYear}/{secondYear}/{id}/tambah-catatan-karyawan', 'createCatatan')->name('createCatatan');

    Route::put('/dashboard/persetujuan-penilaian/{id}/tambah-catatan-karyawan', 'updateCatatan')->name('updateCatatan');
});

Route::controller(CatatanKaryawanController::class)->name('catatanKaryawan.')->middleware('auth', 'user-role:kepala sekolah')->group(function () {
    Route::get('/dashboard/catatan-karyawan', 'index')->name('index');
    Route::get('/dashboard/catatan-karyawan/{firstYear}/{secondYear}', 'showTahun')->name('showTahun');
    
    Route::get('/dashboard/catatan-karyawan/view-catatan-karyawan/{id}/detail', 'show')->name('show');

    Route::get('/dashboard/catatan-karyawan/tambah-catatan-karyawan', 'create')->name('create');
    Route::post('/dashboard/catatan-karyawan', 'store')->name('store');

    Route::get('/dashboard/catatan-karyawan/ubah-catatan-karyawan/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/catatan-karyawan/{id}', 'update')->name('update');

    Route::delete('/dashboard/catatan-karyawan/{id}', 'destroy')->name('destroy');
});

Route::controller(PerhitunganAlternatifController::class)->name('perhitunganAlternatif.')->middleware('auth', 'user-role:kepala sekolah')->group(function () {
    Route::get('/dashboard/perbandingan-alternatif/introduction', 'introduction')->name('introduction');
    Route::get('/dashboard/perbandingan-alternatif', 'index')->name('index');
    Route::get('/dashboard/perbandingan-alternatif/hasil-perbandingan-alternatif', 'hasil')->name('hasil');

    Route::post('/dashboard/perbandingan-alternatif', 'store')->name('store');
});

Route::controller(RankingController::class)->name('ranking.')->middleware('auth', 'user-role:kepala sekolah')->group(function () {
    Route::get('/dashboard/perankingan', 'index')->name('index');
    Route::post('/dashboard/perankingan', 'store')->name('store');
});