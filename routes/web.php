<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\AnggotaController;



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
    return view('layout.app');
});

// route::get('/kategori', [KategoriController::class, 'index'])->name('category.index');

Route::resource('/kategori', KategoriController::class);
Route::get('/kategori/{id}/delete', [KategoriController::class, 'destroy'])->name('category.destroy');

Route::resource('/penerbit', PenerbitController::class);
Route::get('/penerbit/{id}/delete', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');

Route::resource('/anggota', AnggotaController::class);
Route::get('/anggota/{id}/delete', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

