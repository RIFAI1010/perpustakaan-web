<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/homepage', [App\Http\Controllers\Api\HomePageController::class, 'index']);
Route::get('/detail-buku/{slug}', [App\Http\Controllers\Api\DetailBukuController::class, 'index']);
Route::post('/mengantri-peminjaman/{slug}', [App\Http\Controllers\Api\AntriPeminjamanController::class, 'index']);
Route::delete('/mengantri-peminjaman/{slug}', [App\Http\Controllers\Api\AntriPeminjamanController::class, 'batal_antri']);
Route::post('/mengantri-pengembalian/{slug}', [App\Http\Controllers\Api\AntriPengembalianController::class, 'index']);
Route::get('/history', [App\Http\Controllers\Api\HistoryController::class, 'index']);
Route::get('/menunggu', [App\Http\Controllers\Api\MenungguController::class, 'index']);
Route::get('/search/penulis/{slug}', [App\Http\Controllers\Api\SearchController::class, 'penulis']);