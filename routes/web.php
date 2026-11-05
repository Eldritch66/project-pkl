<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EntriSuratController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'beranda')->name('home');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.attempt');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('password.gate')->group(function () {
    Route::get('/entri-surat', [EntriSuratController::class, 'index'])->name('entri-surat');
    Route::post('/entri-surat', [EntriSuratController::class, 'store'])->name('entri-surat.store');
    Route::put('/entri-surat/{entriSurat}', [EntriSuratController::class, 'update'])->name('entri-surat.update');

    Route::get('/daftar-surat', [EntriSuratController::class, 'daftar'])->name('daftar-surat');

    Route::get('/entri-surat/{entriSurat}/cetak', [EntriSuratController::class, 'cetak'])
        ->name('entri-surat.cetak');

    Route::view('/jaringan-informasi-kearsipan-daerah', 'jaringan-informasi-kearsipan-daerah')
        ->name('jikd');
});
