<?php

use App\Http\Controllers\transportasipublikController;
use App\Http\Controllers\kotaController;
use App\Http\Controllers\userController;
use App\Http\Controllers\lokasiController;
use App\Http\Controllers\tripController;
use App\Http\Controllers\ruteController;
use App\Http\Controllers\tiketController;
use App\Http\Controllers\tripmempunyairuteController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('transportasi_publik', transportasipublikController::class);
Route::resource('kota', kotaController::class);
Route::resource('user', userController::class);
Route::resource('lokasi', lokasiController::class);
Route::resource('trip', tripController::class);
Route::resource('rute', ruteController::class);
Route::resource('tiket', tiketController::class);
Route::resource('trip_mempunyai_rute', tripmempunyairuteController::class);
