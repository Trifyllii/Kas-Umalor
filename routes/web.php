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
Route::get('/biaya', [App\Http\Controllers\biayaController::class, 'index'])->name('biaya');
Route::post('/tambahBiaya', [App\Http\Controllers\biayaController::class, 'tambahBiaya']);

Route::get('/daftarDagang', [App\Http\Controllers\dDagangController::class, 'index'])->name('biaya');
Route::get('/lapPenerimaankas', [App\Http\Controllers\lPenerimaankasController::class, 'index'])->name('biaya');
Route::get('/lapPengeluarankas', [App\Http\Controllers\lPengeluarankasController::class, 'index'])->name('biaya');
Route::get('/bukuBesarkas', [App\Http\Controllers\lBukubesarkasController::class, 'index'])->name('biaya');
Route::get('/lapLabarugi', [App\Http\Controllers\lLabarugiController::class, 'index'])->name('biaya');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');