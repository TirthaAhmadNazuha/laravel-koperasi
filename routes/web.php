<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;

Route::resource("/anggota", AnggotaController::class);
Route::get('/', function () {
    return view('welcome');
});
