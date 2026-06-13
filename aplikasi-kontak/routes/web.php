<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
Route::get('/', function () {
    return view('welcome');
});

route::get('/kontak', [KontakController::class, 'index']);