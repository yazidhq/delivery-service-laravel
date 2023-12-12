<?php

use App\Http\Controllers\ArmadaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\auth\AuthenticateController;
use App\Http\Controllers\TitikAntarController;

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

Route::get('/', function () {
    return view('welcome');
});

// resource all of controller
Route::resource('/barang', BarangController::class)->middleware('auth');
Route::resource('/kategori', KategoriController::class)->middleware('auth');
Route::resource('/armada', ArmadaController::class)->middleware('auth');
Route::resource('/titikantar', TitikAntarController::class)->middleware('auth');

// change is_perjalanan to true or false
Route::put('/update-is-perjalanan/{id}', [BarangController::class, 'updateIsPerjalanan'])->name('update-is-perjalanan')->middleware('auth');

// update titik_antar
Route::put('/update-titik-antar/{id}', [BarangController::class, 'updateTitikAntar'])->name('update-titik-antar')->middleware('auth');

// creating pdf surat jalan barang
Route::get('/surat-jalan/{id}', [BarangController::class, 'generateSuratJalan'])->name('surat-jalan');

// authentication
Route::controller(AuthenticateController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
