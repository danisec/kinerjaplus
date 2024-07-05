<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganKriteriaController;
use App\Http\Controllers\PerhitunganSubkriteriaController;
use App\Http\Controllers\RiwayatPenilaianController;
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

Route::controller(DashboardController::class)->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'index')->name('index')->middleware('user-role:superadmin,yayasan,kepala sekolah,deputi,guru,IT,admin,tata usaha tenaga pendidikan,tata usaha non tenaga pendidikan,kerohanian tenaga pendidikan,kerohanian non tenaga pendidikan');

    Route::get('/dashboard/{kodeAlternatif}/getSelfRankChart', 'getSelfRankChart')->name('getSelfRankChart')->middleware('user-role:yayasan,deputi,kepala sekolah,guru,tata usaha tenaga pendidikan,tata usaha non tenaga pendidikan,kerohanian tenaga pendidikan,kerohanian non tenaga pendidikan');

    Route::get('/dashboard/{firstYear}/{secondYear}/getRankTahunAjaranChart', 'getRankTahunAjaranChart')->name('getRankTahunAjaranChart')->middleware('user-role:kepala sekolah,guru,tata usaha tenaga pendidikan,tata usaha non tenaga pendidikan,kerohanian tenaga pendidikan,kerohanian non tenaga pendidikan');
    Route::get('/dashboard/{firstYear}/{secondYear}/getRankTahunAjaranTable', 'getRankTahunAjaranTable')->name('getRankTahunAjaranTable')->middleware('user-role:kepala sekolah,guru,tata usaha tenaga pendidikan,tata usaha non tenaga pendidikan,kerohanian tenaga pendidikan,kerohanian non tenaga pendidikan');

    Route::get('/dashboard/{firstYear}/{secondYear}/{namaGroupKaryawan}/getRankTahunAjaranGroupChart', 'getRankTahunAjaranGroupChart')->name('getRankTahunAjaranGroupChart')->middleware('user-role:superadmin,yayasan,deputi,IT,admin');
    Route::get('/dashboard/{firstYear}/{secondYear}/{namaGroupKaryawan}/getRankTahunAjaranGroupTable', 'getRankTahunAjaranGroupTable')->name('getRankTahunAjaranGroupTable')->middleware('user-role:superadmin,yayasan,deputi,IT,admin');
});

Route::controller(PenilaianController::class)->name('penilaian.')->middleware('auth', 'user-role:yayasan,deputi,kepala sekolah,guru,tata usaha tenaga pendidikan,tata usaha non tenaga pendidikan,kerohanian tenaga pendidikan,kerohanian non tenaga pendidikan')->group(function () {
    Route::get('/dashboard/penilaian/introduction', 'welcome')->name('welcome');
    Route::get('/dashboard/penilaian/tambah-penilaian', 'create')->name('create');

    Route::get('/dashboard/penilaian/tambah-penilaian/get-kriteria/{kodeAlternatif}', 'getKriteria')->name('getKriteria');
    
    Route::post('/dashboard/penilaian/introduction', 'store')->name('store');
});

Route::controller(RiwayatPenilaianController::class)->name('riwayatPenilaian.')->middleware('auth', 'user-role:yayasan,deputi,kepala sekolah,guru,tata usaha tenaga pendidikan,tata usaha non tenaga pendidikan,kerohanian tenaga pendidikan,kerohanian non tenaga pendidikan')->group(function () {
    Route::get('/dashboard/riwayat-penilaian', 'index')->name('index');
    Route::get('/dashboard/riwayat-penilaian/view-penilaian/{id}', 'show')->name('show');
    
    Route::get('/dashboard/riwayat-penilaian/{firstYear}/{secondYear}', 'showTahun')->name('showTahun');
});

Route::controller(PerhitunganKriteriaController::class)->name('perhitunganKriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perbandingan-kriteria', 'index')->name('index')->middleware('user-role:superadmin');
    Route::get('/dashboard/perbandingan-kriteria/hasil-perbandingan-kriteria', 'hasil')->name('hasil')->middleware('user-role:superadmin,kepala sekolah');

    Route::post('/dashboard/perbandingan-kriteria', 'store')->name('store')->middleware('user-role:superadmin');
});

Route::controller(PerhitunganSubkriteriaController::class)->name('perhitunganSubkriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perbandingan-subkriteria', 'index')->name('index')->middleware('user-role:superadmin');
    Route::get('/dashboard/perbandingan-subkriteria/hasil-perbandingan-subkriteria', 'hasil')->name('hasil')->middleware('user-role:superadmin,kepala sekolah');

    Route::post('/dashboard/perbandingan-subkriteria', 'store')->name('store')->middleware('user-role:superadmin');
});

Route::controller(KelolaAkunController::class)->name('kelolaAkun.')->middleware('auth', 'user-role:superadmin,IT')->group(function () {
    Route::get('/dashboard/kelola-akun', 'index')->name('index');

    Route::get('/dashboard/kelola-akun/tambah-akun', 'create')->name('create');
    Route::get('/dashboard/kelola-akun/view-akun/{id}', 'show')->name('show');

    Route::post('/dashboard/kelola-akun/tambah-akun', 'store')->name('store');
    Route::delete('/dashboard/kelola-akun/{id}', 'destroy')->name('destroy');

    Route::get('/dashboard/kelola-akun/ubah-akun/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/kelola-akun/{id}', 'update')->name('update');
});
