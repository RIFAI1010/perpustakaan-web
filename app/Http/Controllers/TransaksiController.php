<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function mengantri_peminjaman(string $idBuku){
        // check apakah user sudah ada di table user_mengantri_peminjaman_buku dengan idBuku sama
        // check apakah user sedang meminjam buku yg sama
        // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
        DB::table('user_mengantri_peminjaman_buku')->insert([
            'buku_id' => $idBuku,
            'peminjam_id' => Auth::user()->id,
            'tanggal_pengajuan_peminjaman' => now(),
            'created_at' => now(),
        ]);

        // redirect with msg
    }

    public function mengantri_pengembalian(Request $request,string $idBuku){
        // check apakah user sudah ada di table user_mengantri_pengembalian_buku dengan idBuku sama
        // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
        $laporanPeminjamanBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung')->where('buku_id', $idBuku)
            ->where('user_id', Auth::user()->id)
            ->first();
        $laporanPeminjamanBerlangsung->update([
            'tanggal_pengembalian_peminjaman' => now(),
            'status_pengembalian' => $request->status_pengembalian,
            'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
            'updated_at' => now(),
        ]);

        DB::table('user_mengantri_pengembalian_buku')->insert([
            'buku_id' => $idBuku,
            'peminjam_id' => Auth::user()->id,
            'tanggal_deadline_peminjaman' => $laporanPeminjamanBerlangsung->tanggal_deadline_peminjaman,
            'tanggal_pengembalian_peminjaman' => now(),
            'status_pengembalian' => $request->status_pengembalian,
            'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
            'created_at' => now(),
        ]);

        // redirect with msg
    }
}
