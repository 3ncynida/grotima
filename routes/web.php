<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\EksepedisiController;
use App\Http\Controllers\StokController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('note', [DataController::class, 'index'])->name('data.index');
    Route::get('note/create', [DataController::class, 'create'])->name('data.create');
    Route::post('note', [DataController::class, 'store'])->name('data.store');
    Route::get('note/{id}/edit', [DataController::class, 'edit'])->name('data.edit'); // Rute untuk mengedit data
    Route::put('note/{id}', [DataController::class, 'update'])->name('data.update'); // Rute untuk memperbarui data
    Route::delete('note/{id}', [DataController::class, 'destroy'])->name('data.destroy');

    Route::get('marketplace', [MarketplaceController::class, 'index'])->name('marketplaces.index');
    Route::get('marketplace/create', [MarketplaceController::class, 'create'])->name('marketplaces.create');
    Route::post('marketplace', [MarketplaceController::class, 'store'])->name('marketplace.store');
    Route::get('marketplace/{id}/edit', [MarketplaceController::class, 'edit'])->name('marketplaces.edit');
    Route::put('marketplace/{id}', [MarketplaceController::class, 'update'])->name('marketplaces.update');
    Route::delete('marketplace/{id}', [MarketplaceController::class, 'destroy'])->name('marketplaces.destroy');
    
    Route::get('ekspedisi', [EksepedisiController::class, 'index'])->name('ekspedisi.index');
    Route::get('ekspedisi/create', [EksepedisiController::class, 'create'])->name('ekspedisi.create');
    Route::post('ekspedisi', [EksepedisiController::class, 'store'])->name('ekspedisi.store');
    Route::get('ekspedisi/{id}/edit', [EksepedisiController::class, 'edit'])->name('ekspedisi.edit');
    Route::put('ekspedisi/{id}', [EksepedisiController::class, 'update'])->name('ekspedisi.update');
    Route::delete('ekspedisi/{id}', [EksepedisiController::class, 'destroy'])->name('ekspedisi.destroy');

    Route::get('stok', [StokController::class, 'index'])->name('stok.index');
    Route::get('stok/create', [StokController::class, 'create'])->name('stok.create');
    Route::post('stok', [StokController::class, 'store'])->name('stok.store');
    Route::get('stok/{id}/edit', [StokController::class, 'edit'])->name('stok.edit');
    Route::put('stok/{id}', [StokController::class, 'update'])->name('stok.update');
    Route::delete('stok/{id}', [StokController::class, 'destroy'])->name('stok.destroy');
    
});