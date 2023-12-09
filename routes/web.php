<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard',[dashboard::class, 'index'])->name('dashboard');
Route::get('create', [dashboard::class, 'create'])->name('create');
Route::post('dashboard/store', [dashboard::class, 'store'])->name('dashboard.store');
Route::get('dashboard/{id}/edit', [dashboard::class, 'edit'])->name('dashboard.edit');
Route::put('dashboard/{id}', [dashboard::class, 'update'])->name('dashboard.update');
Route::delete('dashboard/{id}', [dashboard::class, 'destroy'])->name('dashboard.delete');

Route::get('penulis/index',[PenulisController::class, 'index'])->name('penulis.index');
Route::get('penulis/create', [PenulisController::class,'create'])->name('penulis.create');
Route::post('penulis/store', [PenulisController::class, 'store'])->name('penulis.store');
Route::get('penulis/{id}/edit', [PenulisController::class, 'edit'])->name('penulis.edit');
Route::put('penulis/{id}', [PenulisController::class, 'update'])->name('penulis.update');
Route::delete('penulis/{id}', [PenulisController::class, 'destroy'])->name('penulis.delete');

Route::get('kategori/index',[KategoriController::class, 'index'])->name('kategori.index');
Route::get('kategori/create', [KategoriController::class,'create'])->name('kategori.create');
Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
