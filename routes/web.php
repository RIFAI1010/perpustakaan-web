<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SiswaDetailController;
use App\Http\Controllers\DashboardBukuController;
use App\Http\Controllers\DashboardDendaController;
use App\Http\Controllers\DashboardSiswaController;
use App\Http\Controllers\SiswaDashboardController;
use App\Http\Controllers\SiswaTransaksiController;
use App\Http\Controllers\DashboardPenulisController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardPenerbitController;
use App\Http\Controllers\SiswaMenandaiBukuController;
use App\Http\Controllers\DashboardPenyetujuanPeminjamanController;
use App\Http\Controllers\DashboardPenyetujuanPengembalianController;
use App\Http\Controllers\DashboardLaporanTransaksiPeminjamanBukuController;
use App\Http\Controllers\DashboardLaporanPeminjamanBukuBerlangsungController;

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

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/', function () {
        return view('begin');
    })->name('begin');#
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('/dashboard_siswa', DashboardSiswaController::class);
        Route::resource('/dashboard_petugas', DashboardPetugasController::class);        
    });

    Route::middleware('role:staff')->group(function () {
        Route::resource('/dashboard_buku', DashboardBukuController::class);
        Route::resource('/dashboard_category', DashboardCategoryController::class);
        Route::resource('/dashboard_penulis', DashboardPenulisController::class);
        Route::resource('/dashboard_penerbit', DashboardPenerbitController::class);
        

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

    });

    Route::middleware('role:siswa')->group(function () {
        
        Route::resource('/detail', SiswaDetailController::class);        
        Route::get('/menandai-buku/{slug}', [SiswaMenandaiBukuController::class, 'menandai']);
        Route::get('/mengantri-peminjaman/{slug}', [TransaksiController::class, 'mengantri_peminjaman']);
        Route::get('/mengantri-pengembalian/{slug}', [TransaksiController::class, 'mengantri_pengembalian']);
        Route::get('/batal/mengantri-peminjaman/{slug}', [TransaksiController::class, 'batal_antri_peminjaman']);
        
        Route::get('/proses', [SiswaTransaksiController::class, 'proses']);
        Route::get('/dipinjam', [SiswaTransaksiController::class, 'dipinjam']);
        Route::get('/antrian', [SiswaTransaksiController::class, 'antrian']);
        Route::get('/selesai', [SiswaTransaksiController::class, 'selesai']);
        Route::get('/ditandai', [SiswaMenandaiBukuController::class, 'index']);

        Route::post('/rating/{slug}', [SiswaDetailController::class, 'rating'])->name('rating');

        Route::get('/dashboard/buku', [SiswaDashboardController::class, 'index']);
    });
});