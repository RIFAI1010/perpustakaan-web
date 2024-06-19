<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SiswaTransaksiController extends Controller
{
    public function proses() {
        $currentUser = Auth::user();
        return view('siswa.proses', [
            'is_mengantri_peminjaman' => DB::table('user_mengantri_peminjaman_buku')
            ->join('bukus', 'user_mengantri_peminjaman_buku.buku_id', '=', 'bukus.id')
            ->where('user_mengantri_peminjaman_buku.peminjam_id', $currentUser->id)
            ->select('bukus.*', 'user_mengantri_peminjaman_buku.*')
            ->get(),
            // 'is_dipinjam' =>DB::table('bukus')->where('peminjam_id', $currentUser->id)->get(),
        ]);
    }
    public function dipinjam() {
        $currentUser = Auth::user();
        return view('siswa.dipinjam', [
            'is_dipinjam' => DB::table('laporan_peminjaman_buku_berlangsung')
            ->join('bukus', 'laporan_peminjaman_buku_berlangsung.buku_id', '=', 'bukus.id')
            ->where('laporan_peminjaman_buku_berlangsung.peminjam_id', $currentUser->id)
            ->whereNull('laporan_peminjaman_buku_berlangsung.tanggal_pengembalian_peminjaman')
            ->select('bukus.*', 'laporan_peminjaman_buku_berlangsung.*')
            ->get(),
        ]);
    }

    public function antrian() {
        $currentUser = Auth::user();
        return view('siswa.antrian', [
            'is_antrian' => DB::table('bukus')
            ->join('laporan_peminjaman_buku_berlangsung', 'bukus.id', '=', 'laporan_peminjaman_buku_berlangsung.buku_id')
            ->where('laporan_peminjaman_buku_berlangsung.peminjam_id', $currentUser->id)
            ->whereNotNull('laporan_peminjaman_buku_berlangsung.tanggal_pengembalian_peminjaman')
            ->select('bukus.*', 'laporan_peminjaman_buku_berlangsung.*')
            ->get(),
        ]);
    }
    public function selesai() {
        $currentUser = Auth::user();
        return view('siswa.selesai', [
            'is_selesai' => DB::table('laporan_transaksi_peminjaman_buku')
            ->join('bukus', 'laporan_transaksi_peminjaman_buku.buku_id', '=', 'bukus.id')
            ->where('laporan_transaksi_peminjaman_buku.peminjam_id', $currentUser->id)
            ->select('bukus.*', 'laporan_transaksi_peminjaman_buku.*')
            ->get(),
        ]);
    }
}
