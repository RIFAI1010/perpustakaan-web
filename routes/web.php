<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardBukuController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DashboardPenulisController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPenerbitController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('/dashboard_buku', DashboardBukuController::class);

Route::resource('/dashboard_category', DashboardCategoryController::class);

Route::resource('/dashboard_penulis', DashboardPenulisController::class);

Route::resource('/dashboard_penerbit', DashboardPenerbitController::class);

Route::resource('/dashboard_petugas', DashboardPetugasController::class);

Route::resource('/dashboard_siswa', DashboardSiswaController::class);