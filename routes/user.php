<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
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

Route::controller(ProfileController::class)->name('profile.')->middleware('auth')->group(function () {
    Route::get('/dashboard/my-profile/{id}', 'index')->name('index');

    Route::get('/dashboard/my-profile/ubah-profile/{id}/edit', 'edit')->name('edit');
    Route::put('/dashboard/my-profile/{id}', 'update')->name('update');
});