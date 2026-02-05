<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth', function () {
    return redirect('/login');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'Proseslogin'])->name('login.proses');

Route::get('/register', [AuthController::class, 'shoeRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.proses');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
//menu Kasir
Route::get('/menu',[MenuController::class, 'index'])->name('menu.index');
//toko
Route::get('/toko/create', [TokoController::class, 'create'])->name('toko.create');
Route::post('/toko', [TokoController::class, 'store'])->name('toko.store');
