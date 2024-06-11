<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPenyetujuanPeminjamanController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard_penyetujuan_peminjaman.dashboard_penyetujuan_peminjaman', [
            'data_antri_peminjaman' => DB::table('user_mengantri_peminjaman_buku')->get(),
        ]);
    }

    public function setuju(Request $request, string $id)
    {
        $request->validate([
            'tanggal_deadline_peminjaman' => ['required'],
        ]);
        
        $dataAntrian = DB::table('user_mengantri_peminjaman_buku')->where('id', $id)->first();

        Buku::findOrFail($dataAntrian->buku_id)->update([
            'peminjam_id' => $dataAntrian->peminjam_id,
            'status_ketersediaan' => 0,
            'tanggal_deadline_peminjaman' => $request->tanggal_deadline_peminjaman,
        ]);

        DB::table('laporan_peminjaman_buku_berlangsung')->insert([
            'buku_id' => $dataAntrian->buku_id,
            'peminjam_id' => $dataAntrian->peminjam_id,
            'tanggal_pengajuan_peminjaman' => $dataAntrian->tanggal_pengajuan_peminjaman,
            'tanggal_peminjaman_disetujui' => now(),
            'tanggal_deadline_peminjaman' => $request->tanggal_deadline_peminjaman,
            'created_at' => now(),
        ]);

        DB::table('user_mengantri_peminjaman_buku')->where('id', $id)->delete();

        return redirect()->route('dashboard_penyetujuan_peminjaman')->with(['success' => 'Peminjaman Berhasil Disetujui!']);
    }

    public function tidak_setuju(string $id)
    {
        DB::table('user_mengantri_peminjaman_buku')->where('id', $id)->delete();

        return redirect()->route('dashboard_penyetujuan_peminjaman')->with(['success' => 'Peminjaman Berhasil Ditolak!']);
    }
}
