<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\EksepedisiController;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('data', [DataController::class, 'index'])->name('data.index');
    Route::get('data/create', [DataController::class, 'create'])->name('data.create');
    Route::post('data', [DataController::class, 'store'])->name('data.store');
    
    Route::get('marketplace', [marketplaceController::class, 'index'])->name('marketplace.index');
    Route::get('marketplace/create', [marketplaceController::class, 'create'])->name('marketplace.create');
    Route::post('marketplace', [marketplaceController::class, 'store'])->name('marketplace.store');
    
    Route::get('ekspedisi', [EksepedisiController::class, 'index'])->name('ekspedisi.index');
    Route::get('ekspedisi/create', [EksepedisiController::class, 'create'])->name('ekspedisi.create');
    Route::post('ekspedisi', [EksepedisiController::class, 'store'])->name('ekspedisi.store');
});