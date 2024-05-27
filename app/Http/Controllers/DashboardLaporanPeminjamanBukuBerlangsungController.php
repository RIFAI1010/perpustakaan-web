<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardLaporanPeminjamanBukuBerlangsungController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard_laporan_peminjaman_buku_berlangsung.dashboard_laporan_peminjaman_buku_berlangsung', [
            'data_peminjaman_buku_berlangsung' => DB::table('laporan_peminjaman_buku_berlangsung')->get(),
        ]);
    }
}
