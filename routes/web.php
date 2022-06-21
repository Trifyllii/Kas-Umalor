<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pendapatansewa', [App\Http\Controllers\pSewaController::class, 'index'])->name('pendapatanSewa');

Route::get('/pendapatanlain', [App\Http\Controllers\pLainController::class, 'index'])->name('pendapatanLain');
Route::get('/pembelian', [App\Http\Controllers\pembelianController::class, 'index'])->name('pembelian');
Route::post('/tambahDagang', [App\Http\Controllers\pembelianController::class, 'tambahDagang']);

Route::get('/biaya', [App\Http\Controllers\biayaController::class, 'index'])->name('biaya');
Route::post('/tambahBiaya', [App\Http\Controllers\biayaController::class, 'tambahBiaya']);
Route::post('/editBiaya', [App\Http\Controllers\biayaController::class, 'editBiaya']);

Route::get('/daftarDagang', [App\Http\Controllers\laporanController::class, 'viewDaftardagang'])->name('daftarDagang');
Route::get('/lapPenerimaankas', [App\Http\Controllers\laporanController::class, 'viewPenerimaankas'])->name('lapPenerimaankas');
Route::get('/lapPengeluarankas', [App\Http\Controllers\laporanController::class, 'viewPengeluarankas'])->name('lapPengeluarankas');
Route::get('/bukuBesarkas', [App\Http\Controllers\laporanController::class, 'viewBukubesarkas'])->name('bukuBesarkas');
Route::get('/lapLabarugi', [App\Http\Controllers\laporanController::class, 'viewLabarugi'])->name('lapLabarugi');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');