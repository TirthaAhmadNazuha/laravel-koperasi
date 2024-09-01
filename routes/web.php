<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;

Route::resource("/anggota", AnggotaController::class);
Route::resource("/pinjam", PinjamController::class);
Route::get('/', function () {
    return view('welcome');
});
