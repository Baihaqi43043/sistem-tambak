<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Manajemen Tambak
    Route::get('/tambak', [App\Http\Controllers\Admin\TambakController::class, 'index'])->name('admin.tambak.index');
    Route::get('/tambak/create', [App\Http\Controllers\Admin\TambakController::class, 'create'])->name('admin.tambak.create');
    Route::post('/tambak', [App\Http\Controllers\Admin\TambakController::class, 'store'])->name('admin.tambak.store');
    Route::get('/tambak/{id}', [App\Http\Controllers\Admin\TambakController::class, 'show'])->name('admin.tambak.show');
    Route::get('/tambak/{id}/edit', [App\Http\Controllers\Admin\TambakController::class, 'edit'])->name('admin.tambak.edit');
    Route::put('/tambak/{id}', [App\Http\Controllers\Admin\TambakController::class, 'update'])->name('admin.tambak.update');
    Route::delete('/tambak/{id}', [App\Http\Controllers\Admin\TambakController::class, 'destroy'])->name('admin.tambak.destroy');
});
