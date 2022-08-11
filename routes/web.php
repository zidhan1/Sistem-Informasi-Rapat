<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\NotulensiController;

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

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::post('/statistik/{nip}/divisi/{id_divisi}', [DashboardController::class, 'statistik'])->name('statistik.show');

    Route::get('/pegawai', [PegawaiController::class, 'index']);

    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

    Route::post('/pegawai/{nip}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    Route::get('/rapat', [RapatController::class, 'index']);

    Route::get('/create', [RapatController::class, 'create']);

    Route::post('/create', [RapatController::class, 'store'])->name('rapat.store');

    Route::post('/rapat/{id}', [RapatController::class, 'destroy'])->name('rapat.destroy');

    Route::get('/notulensi', [NotulensiController::class, 'index']);

    Route::post('/notulensi', [NotulensiController::class, 'store'])->name('notulen.store');

    Route::get('/detail/{id}', [RapatController::class, 'detail'])->name('detail.show');

    Route::get('/images', [ImagesController::class, 'index']);

    Route::post('/images', [ImagesController::class, 'store'])->name('images.store');

    Route::get('/images/{id_rapat}', [ImagesController::class, 'showImages'])->name('images.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
