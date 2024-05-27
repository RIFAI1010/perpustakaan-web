<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardDendaController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard_denda.dashboard_denda', [
            'data_denda' => DB::table('laporan_peminjaman_buku_berlangsung')
            ->where('denda', '>', '0')
            ->get(),
        ]);
    }

    public function diterima(string $id)
    {
        $laporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung')
        ->where('id', $id)
        ->first();

        DB::table('laporan_transaksi_peminjaman_buku')->insert([
            'buku_id' => $laporanPeminjamanBukuBerlangsung->buku_id,
            'peminjam_id' => $laporanPeminjamanBukuBerlangsung->peminjam_id,
            'tanggal_pengajuan_peminjaman' => $laporanPeminjamanBukuBerlangsung->tanggal_pengajuan_peminjaman,
            'tanggal_peminjaman_disetujui' => $laporanPeminjamanBukuBerlangsung->tanggal_peminjaman_disetujui,
            'tanggal_deadline_peminjaman' => $laporanPeminjamanBukuBerlangsung->tanggal_deadline_peminjaman,
            'tanggal_pengembalian_peminjaman' => $laporanPeminjamanBukuBerlangsung->tanggal_pengembalian_peminjaman,
            'tanggal_pengembalian_disetujui' => now(),
            'status_pengembalian' => $laporanPeminjamanBukuBerlangsung->status_pengembalian,
            'denda' => $laporanPeminjamanBukuBerlangsung->denda,
            'foto_buku_dikembalikan' => $laporanPeminjamanBukuBerlangsung->foto_buku_dikembalikan,
            'created_at' => now(),
        ]);

        DB::table('laporan_peminjaman_buku_berlangsung')
        ->where('id', $id)
        ->delete();

        return redirect()->route('dashboard_denda')->with(['success' => 'Pembayaran Denda dan Pengembalian Berhasil Disetujui!']);
    }
}
