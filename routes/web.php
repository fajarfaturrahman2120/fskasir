<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StokController;


Route::get('/', function () {return view('welcome');});

Route::get('/auth', function () { return redirect('/login');});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'Proseslogin'])->name('login.proses');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.proses');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('/logout', function () {Auth::logout();return redirect('/login');})->name('logout');
//menu Kasir
Route::get('/menu/{id_toko}', [MenuController::class, 'index'])->name('menu.index');
Route::get('/toko',[TokoController::class, 'index'])->name('toko.index');
Route::get('/toko/create', [TokoController::class, 'create'])->name('toko.create');
Route::post('/toko', [TokoController::class, 'store'])->name('toko.store');
Route::get('/toko/{id_toko}', [TokoController::class, 'show'])->name('toko.show');
Route::get('/toko/{id_toko}/edit', [TokoController::class, 'edit'])->name('toko.edit');
Route::put('/toko/{id_toko}', [TokoController::class, 'update'])->name('toko.update');
Route::delete('/toko/{id_toko}', [TokoController::class, 'destroy'])->name('toko.destroy');
//Produk
Route::get('/toko/{id_toko}/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/toko/{id_toko}/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/{id_toko}', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/toko/{id_toko}/produk/{id_produk}',
    [ProdukController::class, 'show']
)->name('produk.show');

Route::get('/produk/{id_produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id_produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

Route::prefix('toko/{id_toko}')->group(function () {

    Route::get('/kategori', [KategoriController::class, 'index'])
        ->name('kategori.index');

    Route::get('/kategori/create', [KategoriController::class, 'create'])
        ->name('kategori.create');

    Route::post('/kategori', [KategoriController::class, 'store'])
        ->name('kategori.store');

    Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])
        ->name('kategori.edit');

    Route::put('/kategori/{id_kategori}', [KategoriController::class, 'update'])
        ->name('kategori.update');

    Route::delete('/kategori/{id_kategori}', [KategoriController::class, 'destroy'])
        ->name('kategori.destroy');


});
   // ======================
    // STOK
    // ======================

    Route::get('/produk/{id_produk}/stok',
        [StokController::class, 'index']
    )->name('stok.index');

    Route::post('/produk/{id_produk}/stok',
        [StokController::class, 'store']
    )->name('stok.store');

