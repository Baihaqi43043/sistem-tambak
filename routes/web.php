<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\KategoriBiayaController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\PetambakController;
use App\Http\Controllers\TambakController;
use App\Http\Controllers\SiklusBudidayaController;
use App\Http\Controllers\PanenController;

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Petambak routes
Route::resource('petambak', PetambakController::class);
Route::patch('/petambak/{petambak}/toggle-status', [PetambakController::class, 'toggleStatus'])
    ->name('petambak.toggle-status');

// Tambak routes
Route::resource('tambak', TambakController::class);
Route::get('/petambak/{petambak}/tambak', [TambakController::class, 'byPetambak'])
    ->name('tambak.by-petambak');

// Siklus Budidaya routes
Route::resource('siklus', SiklusBudidayaController::class);

// Panen routes
Route::resource('panen', PanenController::class);

// Kategori Biaya & Biaya routes
Route::resource('kategori-biaya', KategoriBiayaController::class);
Route::resource('biaya', BiayaController::class);

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
