<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardBukuController;
use App\Http\Controllers\DashboardDendaController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\DashboardPenulisController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPenerbitController;
use App\Http\Controllers\DashboardPenyetujuanPeminjamanController;
use App\Http\Controllers\DashboardPenyetujuanPengembalianController;
use App\Http\Controllers\DashboardLaporanTransaksiPeminjamanBukuController;
use App\Http\Controllers\DashboardLaporanPeminjamanBukuBerlangsungController;
use Illuminate\Support\Facades\Auth;

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




Route::resource('/dashboard_buku', DashboardBukuController::class);

Route::resource('/dashboard_category', DashboardCategoryController::class);

Route::resource('/dashboard_penulis', DashboardPenulisController::class);

Route::resource('/dashboard_penerbit', DashboardPenerbitController::class);

Route::resource('/dashboard_petugas', DashboardPetugasController::class);

Route::resource('/dashboard_siswa', DashboardSiswaController::class);

Route::get('/dashboard_penyetujuan_peminjaman', [DashboardPenyetujuanPeminjamanController::class, 'index'])->name('dashboard_penyetujuan_peminjaman');
Route::put('/dashboard_penyetujuan_peminjaman/setuju/{id}', [DashboardPenyetujuanPeminjamanController::class, 'setuju']);
Route::delete('/dashboard_penyetujuan_peminjaman/tidak_setuju/{id}', [DashboardPenyetujuanPeminjamanController::class, 'tidak_setuju']);

Route::get('/dashboard_penyetujuan_pengembalian', [DashboardPenyetujuanPengembalianController::class, 'index'])->name('dashboard_penyetujuan_pengembalian');
Route::delete('/dashboard_penyetujuan_pengembalian/setuju/{id}', [DashboardPenyetujuanPengembalianController::class, 'setuju']);
Route::put('/dashboard_penyetujuan_pengembalian/beri_denda/{id}', [DashboardPenyetujuanPengembalianController::class, 'beri_denda']);

Route::get('/dashboard_denda', [DashboardDendaController::class, 'index'])->name('dashboard_denda');
Route::delete('/dashboard_denda/diterima/{id}', [DashboardDendaController::class, 'diterima']);

Route::get('/dashboard_laporan_peminjaman_berlangsung', [DashboardLaporanPeminjamanBukuBerlangsungController::class, 'index']);
Route::get('/dashboard_transaksi_peminjaman', [DashboardLaporanTransaksiPeminjamanBukuController::class, 'index']);




Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     $role = auth()->user()->role;
    //     if ($role === 'admin') {
    //         return redirect()->route('admin.dashboard');
    //     } elseif ($role === 'petugas') {
    //         return redirect()->route('petugas.dashboard');
    //     } elseif ($role === 'siswa') {
    //         return redirect()->route('siswa.dashboard');
    //     }
    //     return abort(403, 'Unauthorized action.');
    // })->name('dashboard');
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');

    

    Route::middleware('role:admin')->group(function () {
        // Route::get('/admin', function () {
        //     return view('admin.dashboard');
        // })->name('admin.dashboard');
    });

    Route::middleware('role:staff')->group(function () {
        // Route::get('/petugas', function () {
        //     return view('petugas.dashboard');
        // })->name('petugas.dashboard');
    });

    Route::middleware('role:siswa')->group(function () {
        // Route::get('/siswa', function () {
        //     return view('siswa.dashboard');
        // })->name('siswa.dashboard');
        Route::get('/profil', function () {
            return view('siswa.profil');
        })->name('siswa.profil');
    });
});