<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PengunjungController;

// Halaman Pengunjung
Route::get('/', [PengunjungController::class, 'index'])
    ->name('beranda');

Route::get('/detail-artikel/{id}', [PengunjungController::class, 'detail'])
    ->name('artikel.detail');

Route::get('/kategori-artikel/{id}', [PengunjungController::class, 'kategori'])
    ->name('kategori.filter');
    
// Route halaman login
Route::get('/login', [LoginController::class, 'index'])
->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'proses'])
->name('login.proses')->middleware('guest');

// Route logout
Route::post('/logout', [LoginController::class, 'logout'])
->name('logout')
->middleware('auth');

// Route yang dilindungi middleware auth
Route::middleware('auth')->group(function (){
    // Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

    // Route resource untuk ketiga entitas
    Route::resource('artikel', ArtikelController::class)->except(['show']);
    Route::resource('penulis', PenulisController::class)->parameters(['penulis' => 'penulis'])->except(['show']);
    Route::resource('kategori', KategoriArtikelController::class)->except(['show']);
});

