<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganKriteriaController;
use App\Http\Controllers\PerhitunganSubkriteriaController;
use App\Http\Controllers\RiwayatPenilaianController;
use App\Http\Controllers\TanggalPenilaianController;
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

Route::controller(DashboardController::class)->name('dashboard.')->middleware('auth', 'permission:dashboard')->group(function () {
    Route::get('/dashboard', 'index')->name('index');

    Route::get('/dashboard/{kodeAlternatif}/getSelfRankChart', 'getSelfRankChart')->name('getSelfRankChart')->middleware('role:yayasan|deputi|kepala sekolah|guru|tata usaha tenaga pendidikan|tata usaha non tenaga pendidikan|kerohanian tenaga pendidikan|kerohanian non tenaga pendidikan');

    Route::get('/dashboard/{idTanggalPenilaian}/getRankTahunAjaranChart', 'getRankTahunAjaranChart')->name('getRankTahunAjaranChart')->middleware('role:kepala sekolah|guru|tata usaha tenaga pendidikan|tata usaha non tenaga pendidikan|kerohanian tenaga pendidikan|kerohanian non tenaga pendidikan');

    Route::get('/dashboard/{idTanggalPenilaian}/getRankTahunAjaranTable', 'getRankTahunAjaranTable')->name('getRankTahunAjaranTable')->middleware('role:kepala sekolah|guru|tata usaha tenaga pendidikan|tata usaha non tenaga pendidikan|kerohanian tenaga pendidikan|kerohanian non tenaga pendidikan');

    Route::get('/dashboard/{idTanggalPenilaian}/{namaGroupKaryawan}/getRankTahunAjaranGroupChart', 'getRankTahunAjaranGroupChart')->name('getRankTahunAjaranGroupChart')->middleware('role:yayasan|deputi');
    
    Route::get('/dashboard/{idTanggalPenilaian}/{namaGroupKaryawan}/getRankTahunAjaranGroupTable', 'getRankTahunAjaranGroupTable')->name('getRankTahunAjaranGroupTable')->middleware('role:yayasan|deputi');
});

Route::controller(TanggalPenilaianController::class)->name('tanggalPenilaian.')->middleware('auth', 'permission:penilaian')->group(function () {
    Route::get('/dashboard/penilaian/buat-tanggal-penilaian', 'create')->name('create');
    Route::post('/dashboard/penilaian/buat-tanggal-penilaian', 'store')->name('store');
});

Route::controller(PenilaianController::class)->name('penilaian.')->middleware('auth', 'permission:penilaian')->group(function () {
    Route::get('/dashboard/penilaian/introduction', 'welcome')->name('welcome');
    
    Route::get('/dashboard/penilaian/tambah-penilaian', 'create')->name('create');
    Route::post('/dashboard/penilaian/introduction', 'store')->name('store');

    Route::get('/dashboard/penilaian/tambah-penilaian/get-kriteria/{kodeAlternatif}', 'getKriteria')->name('getKriteria');
    
});

Route::controller(RiwayatPenilaianController::class)->name('riwayatPenilaian.')->middleware('auth', 'permission:riwayat-penilaian')->group(function () {
    Route::get('/dashboard/riwayat-penilaian', 'index')->name('index');

    Route::get('/dashboard/riwayat-penilaian/{firstYear}/{secondYear}/{semester}', 'showTahun')->name('showTahun');
    Route::get('/dashboard/riwayat-penilaian/{id}/view-penilaian', 'show')->name('show');
});

Route::controller(PerhitunganKriteriaController::class)->name('perhitunganKriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perbandingan-kriteria', 'index')->name('index')->middleware('role:superadmin');
    Route::get('/dashboard/perbandingan-kriteria/pedoman', 'pedoman')->name('pedoman')->middleware('role:superadmin');

    Route::get('/dashboard/perbandingan-kriteria/hasil-perbandingan-kriteria', 'hasil')->name('hasil')->middleware('role:superadmin|kepala sekolah');
    
    Route::post('/dashboard/perbandingan-kriteria', 'store')->name('store')->middleware('role:superadmin');
});

Route::controller(PerhitunganSubkriteriaController::class)->name('perhitunganSubkriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perbandingan-subkriteria', 'index')->name('index')->middleware('role:superadmin');
    Route::get('/dashboard/perbandingan-subkkriteria/pedoman', 'pedoman')->name('pedoman')->middleware('role:superadmin');

    Route::get('/dashboard/perbandingan-subkriteria/hasil-perbandingan-subkriteria', 'hasil')->name('hasil')->middleware('role:superadmin|kepala sekolah');

    Route::post('/dashboard/perbandingan-subkriteria', 'store')->name('store')->middleware('role:superadmin');
});

Route::controller(KelolaAkunController::class)->name('kelolaAkun.')->middleware('auth', 'permission:kelola-akun')->group(function () {
    Route::get('/dashboard/kelola-akun', 'index')->name('index');

    Route::get('/dashboard/kelola-akun/tambah-akun', 'create')->name('create');
    Route::get('/dashboard/kelola-akun/view-akun/{id}', 'show')->name('show');

    Route::post('/dashboard/kelola-akun/tambah-akun', 'store')->name('store');
    Route::delete('/dashboard/kelola-akun/{id}', 'destroy')->name('destroy');

    Route::get('/dashboard/kelola-akun/ubah-akun/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/kelola-akun/{id}', 'update')->name('update');
});
