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
    return View::make('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/pendapatansewa', [App\Http\Controllers\pSewaController::class, 'index'])->name('pendapatanSewa');
Route::post('/tambahPendapatansewa', [App\Http\Controllers\pSewaController::class, 'tambahPendapatanSewa']);
Route::post('/editPendapatansewa', [App\Http\Controllers\pSewaController::class, 'editPendapatanSewa']);
Route::post('/hapusPendapatansewa', [App\Http\Controllers\pSewaController::class, 'hapusPendapatanSewa']);

Route::get('/pendapatanlain', [App\Http\Controllers\pLainController::class, 'index'])->name('pendapatanLain');
Route::post('/tambahPendapatanlain', [App\Http\Controllers\pLainController::class, 'tambahPendapatanLain']);
Route::post('/editPendapatanlain', [App\Http\Controllers\pLainController::class, 'editPendapatanLain']);
Route::post('/hapusPendapatanlain', [App\Http\Controllers\pLainController::class, 'hapusPendapatanLain']);

Route::get('/pembelian', [App\Http\Controllers\pembelianController::class, 'index'])->name('pembelian');
Route::post('/tambahPembelian', [App\Http\Controllers\pembelianController::class, 'tambahPembelian']);
Route::post('/editPembelian', [App\Http\Controllers\pembelianController::class, 'editPembelian']);
Route::post('/hapusPembelian', [App\Http\Controllers\pembelianController::class, 'hapusPembelian']);

Route::get('/biaya', [App\Http\Controllers\biayaController::class, 'index'])->name('biaya');
Route::post('/tambahBiaya', [App\Http\Controllers\biayaController::class, 'tambahBiaya']);
Route::post('/editBiaya', [App\Http\Controllers\biayaController::class, 'editBiaya']);
Route::post('/hapusBiaya', [App\Http\Controllers\biayaController::class, 'hapusBiaya']);

Route::get('/lapPendapatansewa', [App\Http\Controllers\laporanController::class, 'viewPendapatansewa'])->name('lapPendapatansewa');
Route::post('/lapPendapatansewa/sorted', [App\Http\Controllers\laporanController::class, 'sortedPendapatansewa']);

Route::get('/lapPendapatanlain', [App\Http\Controllers\laporanController::class, 'viewPendapatanlain'])->name('lapPendapatanlain');
Route::post('/lapPendapatanlain/sorted', [App\Http\Controllers\laporanController::class, 'sortedPendapatanlain']);

Route::get('/lapPembelian', [App\Http\Controllers\laporanController::class, 'viewPembelian'])->name('lapPembelian');
Route::post('/lapPembelian/sorted', [App\Http\Controllers\laporanController::class, 'sortedPembelian']);

Route::get('/lapPenerimaankas', [App\Http\Controllers\laporanController::class, 'viewPenerimaankas'])->name('lapPenerimaankas');
Route::post('/lapPenerimaankas/sorted', [App\Http\Controllers\laporanController::class, 'sortedPenerimaanKas']);

Route::get('/lapPengeluarankas', [App\Http\Controllers\laporanController::class, 'viewPengeluarankas'])->name('lapPengeluarankas');
Route::post('/lapPengeluarankas/sorted', [App\Http\Controllers\laporanController::class, 'sortedPengeluaranKas']);

Route::get('/bukuBesarkas', [App\Http\Controllers\laporanController::class, 'viewBukubesarkas'])->name('bukuBesarkas');
Route::post('/bukuBesarkas/sorted', [App\Http\Controllers\laporanController::class, 'sortedBukubesarkas']);

Auth::routes();

//Route::get('/home', function() {
  //  return view('home');})
  //  ->name('home')->middleware('auth');