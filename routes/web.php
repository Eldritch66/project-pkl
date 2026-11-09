<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SkController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'bakesbangpol')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.attempt');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/sk', [SkController::class, 'index'])->name('sk.index');
    Route::get('/sk/{upload}/download', [SkController::class, 'download'])->name('sk.download');

    Route::post('/sk/upload', [SkController::class, 'upload'])
        ->middleware('role:pemohon')
        ->name('sk.upload');
});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/daftar-surat', [DisposisiController::class, 'daftar'])->name('daftar-surat');

    Route::get('/disposisi', [DisposisiController::class, 'index'])->name('disposisi.index');
    Route::post('/disposisi', [DisposisiController::class, 'store'])->name('disposisi.store');
    Route::put('/disposisi/{entriSurat}', [DisposisiController::class, 'update'])->name('disposisi.update');
    Route::get('/disposisi/{entriSurat}/cetak', [DisposisiController::class, 'cetak'])->name('disposisi.cetak');
});
