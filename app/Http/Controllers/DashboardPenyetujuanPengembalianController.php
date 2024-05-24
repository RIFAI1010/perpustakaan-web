<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPenyetujuanPengembalianController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard_penyetujuan_pengembalian.dashboard_penyetujuan_pengembalian', [
            'data_antri_pengembalian' => DB::table('user_mengantri_pengembalian_buku')->get(),
        ]);
    }

    public function setuju(string $id)
    {
        $dataAntrian = DB::table('user_mengantri_pengembalian_buku')->where('id', $id)->first();
        $laporanTransaksiPeminjamanBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung')
            ->where('buku_id', $dataAntrian->buku_id)
            ->where('peminjam_id', $dataAntrian->peminjam_id)
            ->first();

        DB::table('laporan_transaksi_peminjaman_buku')->insert([
            'buku_id' => $laporanTransaksiPeminjamanBerlangsung->buku_id,
            'peminjam_id' => $laporanTransaksiPeminjamanBerlangsung->peminjam_id,
            'tanggal_pengajuan_peminjaman' => $laporanTransaksiPeminjamanBerlangsung->tanggal_pengajuan_peminjaman,
            'tanggal_peminjaman_disetujui' => $laporanTransaksiPeminjamanBerlangsung->tanggal_peminjaman_disetujui,
            'tanggal_deadline_peminjaman' => $laporanTransaksiPeminjamanBerlangsung->tanggal_deadline_peminjaman,
            'tanggal_pengembalian_peminjaman' => $laporanTransaksiPeminjamanBerlangsung->tanggal_pengembalian_peminjaman,
            'tanggal_pengembalian_disetujui' => now(),
            'status_pengembalian' => $laporanTransaksiPeminjamanBerlangsung->status_pengembalian,
            'denda' => $laporanTransaksiPeminjamanBerlangsung->denda,
            'foto_buku_dikembalikan' => $laporanTransaksiPeminjamanBerlangsung->foto_buku_dikembalikan,
        ]);

        Buku::findOrFail($dataAntrian->buku_id)->update([
            'peminjam_id' => null,
            'status_ketersediaan' => 1,
            'tanggal_deadline_peminjaman' => null,
            'updated_at' => now(),
        ]);
        
        DB::table('laporan_peminjaman_buku_berlangsung')
            ->where('buku_id', $dataAntrian->buku_id)
            ->where('peminjam_id', $dataAntrian->peminjam_id)
            ->delete();

        DB::table('user_mengantri_pengembalian_buku')->where('id', $id)->delete();

        return redirect()->route('dashboard_penyetujuan_pengembalian')->with(['success' => 'Pengembalian Berhasil Disetujui!']);
    }

    public function beri_denda()
    {

    }
}
