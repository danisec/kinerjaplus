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

Route::controller(PersetujuanPenilaianController::class)->name('persetujuanPenilaian.')->middleware('auth', 'direct.permission:persetujuan penilaian')->group(function () {
    Route::get('/dashboard/persetujuan-penilaian', 'index')->name('index');
    
    Route::get('/dashboard/persetujuan-penilaian/{idGroupKaryawan}/{firstYear}/{secondYear}/{semester}', 'showTahunPimpinan')->name('showTahunPimpinan');

    Route::get('/dashboard/persetujuan-penilaian/{firstYear}/{secondYear}/{semester}', 'showTahun')->name('showTahun');

    Route::get('/dashboard/persetujuan-penilaian/{id}/review-penilaian', 'show')->name('show');
    Route::put('/dashboard/persetujuan-penilaian/{id}/review-penilaian', 'update')->name('update');
    
    Route::get('/dashboard/persetujuan-penilaian/{firstYear}/{secondYear}/{semester}/{id}/tambah-catatan-karyawan', 'createCatatan')->name('createCatatan');

    Route::post('/dashboard/persetujuan-penilaian/{firstYear}/{secondYear}/{semester}/{id}/tambah-catatan-karyawan', 'storeCatatan')->name('storeCatatan');

    Route::delete('/dashboard/persetujuan-penilaian/{id}', 'destroy')->name('destroy');
});

Route::controller(CatatanKaryawanController::class)->name('catatanKaryawan.')->middleware('auth', 'direct.permission:catatan pegawai')->group(function () {
    Route::get('/dashboard/catatan-karyawan', 'index')->name('index');

    Route::get('/dashboard/catatan-karyawan/{idGroupKaryawan}/{firstYear}/{secondYear}/{semester}', 'showTahunPimpinan')->name('showTahunPimpinan');
    Route::get('/dashboard/catatan-karyawan/{firstYear}/{secondYear}/{semester}', 'showTahun')->name('showTahun');
    
    Route::get('/dashboard/catatan-karyawan/view-catatan-karyawan/{id}/{firstYear}/{secondYear}/{semester}/detail', 'show')->name('show');

    Route::get('/dashboard/catatan-karyawan/ubah-catatan-karyawan/{id}/{firstYear}/{secondYear}/{semester}/edit', 'edit')->name('edit');
    Route::put('/dashboard/catatan-karyawan/ubah-catatan-karyawan/{id}', 'update')->name('update');

    Route::delete('/dashboard/catatan-karyawan/{id}', 'destroy')->name('destroy');
});

Route::controller(PerhitunganAlternatifController::class)->name('perhitunganAlternatif.')->middleware('auth', 'permission:perbandingan pegawai')->group(function () {
    Route::get('/dashboard/perbandingan-alternatif/introduction', 'introduction')->name('introduction');

    Route::get('/dashboard/perbandingan-alternatif/{firstYear}/{secondYear}/{semester}', 'index')->name('index');
    Route::get('/dashboard/perbandingan-alternatif/pedoman', 'pedoman')->name('pedoman');
    
    Route::get('/dashboard/perbandingan-alternatif/hasil-perbandingan-alternatif/{firstYear}/{secondYear}/{semester}', 'hasil')->name('hasil');

    Route::post('/dashboard/perbandingan-alternatif', 'store')->name('store');
});

Route::controller(RankingController::class)->name('ranking.')->middleware('auth', 'direct.permission:perankingan')->group(function () {
    Route::get('/dashboard/perankingan', 'index')->name('index');
    Route::get('/dashboard/perankingan/{idTanggalPenilaian}/{firstYear}/{secondYear}/{semester}/details', 'show')->name('show');

    Route::post('/dashboard/perankingan', 'store')->name('store');
    Route::delete('/dashboard/perankingan/{idTanggalPenilaian}/{firstYear}/{secondYear}/{semester}', 'destroy')->name('destroy');
});