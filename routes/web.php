<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganAlternatifController;
use App\Http\Controllers\PerhitunganKriteriaController;
use App\Http\Controllers\PerhitunganSubkriteriaController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkalaIndikatorController;
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

Route::controller(DashboardController::class)->name('dashboard.')->middleware('auth', 'user-role:superadmin,yayasan,kepala sekolah,atasan langsung,guru,IT')->group(function () {
    Route::get('/dashboard', 'index')->name('index');
    Route::post('/dashboard', 'store')->name('store');
});

Route::controller(AlternatifController::class)->name('alternatif.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-alternatif', 'index')->name('index')->middleware('user-role:superadmin,atasan langsung');
    Route::get('/dashboard/data-alternatif/view-alternatif/{id}', 'show')->name('show')->middleware('user-role:superadmin,atasan langsung');

    Route::get('/dashboard/data-alternatif/tambah-alternatif', 'create')->name('create')->middleware('user-role:superadmin');
    Route::post('/dashboard/data-alternatif', 'store')->name('store')->middleware('user-role:superadmin');

    Route::get('/dashboard/data-alternatif/ubah-alternatif/{id}/edit', 'edit')->name('edit')->middleware('user-role:superadmin');
    Route::put('/dashboard/data-alternatif/{id}', 'update')->name('update')->middleware('user-role:superadmin');

    Route::delete('/dashboard/data-alternatif/{id}', 'destroy')->name('destroy')->middleware('user-role:superadmin');
});

Route::controller(KriteriaController::class)->name('kriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-kriteria', 'index')->name('index')->middleware('user-role:superadmin,atasan langsung');
    Route::get('/dashboard/data-kriteria/view-kriteria/{id}', 'show')->name('show')->middleware('user-role:superadmin,atasan langsung');

    Route::get('/dashboard/data-kriteria/tambah-kriteria', 'create')->name('create')->middleware('user-role:superadmin');
    Route::post('/dashboard/data-kriteria', 'store')->name('store')->middleware('user-role:superadmin');

    Route::get('/dashboard/data-kriteria/ubah-kriteria/{id}/edit', 'edit')->name('edit')->middleware('user-role:superadmin');
    Route::put('/dashboard/data-kriteria/{id}', 'update')->name('update')->middleware('user-role:superadmin');

    Route::delete('/dashboard/data-kriteria/{id}', 'destroy')->name('destroy')->middleware('user-role:superadmin');
});

Route::controller(SubkriteriaController::class)->name('subkriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-subkriteria', 'index')->name('index')->middleware('user-role:superadmin,atasan langsung');
    Route::get('/dashboard/data-subkriteria/view-subkriteria/{id}', 'show')->name('show')->middleware('user-role:superadmin,atasan langsung');

    Route::get('/dashboard/data-subkriteria/tambah-subkriteria', 'create')->name('create')->middleware('user-role:superadmin');
    Route::post('/dashboard/data-subkriteria', 'store')->name('store')->middleware('user-role:superadmin');

    Route::get('/dashboard/data-subkriteria/ubah-subkriteria/{id}/edit', 'edit')->name('edit')->middleware('user-role:superadmin');
    Route::put('/dashboard/data-subkriteria/{id}', 'update')->name('update')->middleware('user-role:superadmin');

    Route::delete('/dashboard/data-subkriteria/{id}', 'destroy')->name('destroy')->middleware('user-role:superadmin');
});

Route::controller(SkalaIndikatorController::class)->name('skalaIndikator.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-skala-indikator', 'index')->name('index')->middleware('user-role:superadmin,atasan langsung');
    Route::get('/dashboard/data-skala-indikator/view-skala-indikator/{id}', 'show')->name('show')->middleware('user-role:superadmin,atasan langsung');

    Route::get('/dashboard/data-skala-indikator/tambah-skala-indikator', 'create')->name('create')->middleware('user-role:superadmin');
    Route::post('/dashboard/data-skala-indikator', 'store')->name('store')->middleware('user-role:superadmin');

    Route::get('/dashboard/data-skala-indikator/ubah-skala-indikator/{id}/edit', 'edit')->name('edit')->middleware('user-role:superadmin');
    Route::put('/dashboard/data-skala-indikator/{id}', 'update')->name('update')->middleware('user-role:superadmin');

    Route::delete('/dashboard/data-skala-indikator/{id}', 'destroy')->name('destroy')->middleware('user-role:superadmin');

    Route::get('/dashboard/data-skala-indikator/tambah-skala-indikator/{kodeSubkriteria}/getIndikatorSubkriteria', 'getIndikatorSubkriteria')->name('getIndikatorSubkriteria');
});

Route::controller(PenilaianController::class)->name('penilaian.')->middleware('auth')->group(function () {
    Route::get('/dashboard/data-penilaian', 'index')->name('index')->middleware('user-role:superadmin');
    Route::get('/dashboard/data-penilaian/view-penilaian/{id}', 'show')->name('show')->middleware('user-role:superadmin');

    Route::get('/dashboard/data-penilaian/introduction', 'welcome')->name('welcome')->middleware('user-role:kepala sekolah,atasan langsung,guru');
    Route::get('/dashboard/data-penilaian/tambah-penilaian', 'create')->name('create')->middleware('user-role:kepala sekolah,atasan langsung,guru');
    Route::post('/dashboard/data-penilaian', 'store')->name('store')->middleware('user-role:kepala sekolah,atasan langsung,guru');

    Route::get('/dashboard/data-penilaian/ubah-penilaian/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/data-penilaian/{id}', 'update')->name('update');
    
    Route::delete('/dashboard/data-penilaian/{id}', 'destroy')->name('destroy');
});

Route::controller(PerhitunganKriteriaController::class)->name('perhitunganKriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perhitungan-perbandingan-kriteria', 'index')->name('index')->middleware('user-role:superadmin');
    Route::get('/dashboard/perhitungan-perbandingan-kriteria/hasil-perbandingan-kriteria', 'hasil')->name('hasil')->middleware('user-role:superadmin,atasan langsung');

    Route::post('/dashboard/perhitungan-perbandingan-kriteria', 'store')->name('store')->middleware('user-role:superadmin');
});

Route::controller(PerhitunganSubkriteriaController::class)->name('perhitunganSubkriteria.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perhitungan-perbandingan-subkriteria', 'index')->name('index')->middleware('user-role:superadmin');
    Route::get('/dashboard/perhitungan-perbandingan-subkriteria/hasil-perbandingan-subkriteria', 'hasil')->name('hasil')->middleware('user-role:superadmin,atasan langsung');

    Route::post('/dashboard/perhitungan-perbandingan-subkriteria', 'store')->name('store')->middleware('user-role:superadmin');
});

Route::controller(PerhitunganAlternatifController::class)->name('perhitunganAlternatif.')->middleware('auth')->group(function () {
    Route::get('/dashboard/perhitungan-perbandingan-alternatif', 'index')->name('index')->middleware('user-role:superadmin');
    Route::get('/dashboard/perhitungan-perbandingan-alternatif/hasil-perbandingan-alternatif', 'hasil')->name('hasil')->middleware('user-role:superadmin,atasan langsung');

    Route::post('/dashboard/perhitungan-perbandingan-alternatif', 'store')->name('store')->middleware('user-role:superadmin');
});

Route::controller(RankingController::class)->name('ranking.')->middleware('auth', 'user-role:superadmin,atasan langsung')->group(function () {
    Route::get('/dashboard/perankingan', 'index')->name('index');
    Route::post('/dashboard/perankingan', 'store')->name('store');
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
