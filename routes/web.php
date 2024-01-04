<?php

use App\Models\Barang;
use App\Models\LogBarang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TitikAntarController;
use App\Http\Controllers\auth\AuthenticateController;

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
    return view('home');
});

Route::get('/', function () {
    $search = request('search');
    $barangs = $search ? Barang::where('nomor_resi', 'like', '%' . $search . '%')->get() : [];

    return view('home', ['barangs' => $barangs, 'logbarang' => LogBarang::orderBy('id', 'DESC')->get()]);
})->name('index');

// resource all of controller
Route::resource('/barang', BarangController::class)->middleware('auth');
Route::resource('/kategori', KategoriController::class)->middleware('auth');
Route::resource('/armada', ArmadaController::class)->middleware('auth');
Route::resource('/titikantar', TitikAntarController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/role', RoleController::class)->middleware('auth');

// update titik_antar
Route::put('/update-titik-antar/{id}', [BarangController::class, 'updateTitikAntar'])->name('update-titik-antar')->middleware('auth');

// update status perjalanan
Route::put('/update-status/{id}', [BarangController::class, 'updateStatus'])->name('update-status')->middleware('auth');

// creating pdf surat jalan barang
Route::get('/surat-jalan/{id}', [BarangController::class, 'generateSuratJalan'])->name('surat-jalan')->middleware('auth');

// export barang to excel
Route::get('/export-barang-excel', [BarangController::class, 'exportToExcel'])->name('export-barang-excel')->middleware('auth');

// log barang
Route::delete('/singleLog/{id}', [BarangController::class, 'hapusSingleLog'])->name('singleLog.destroy')->middleware('auth');
Route::delete('/allLog/{id}', [BarangController::class, 'hapusAllLog'])->name('allLog.destroy')->middleware('auth');

// authentication
Route::controller(AuthenticateController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
