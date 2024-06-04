<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AntriPengembalianController extends Controller
{
    public function index(Request $request, string $slug){
        //define validation rules
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $currentUser = User::findOrFail($request->user_id);
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $tableUserMengantriPengembalian = DB::table('user_mengantri_pengembalian_buku');
        $tableLaporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung');
        $laporanPeminjamanBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung')->where('buku_id', $buku->id)
            ->where('peminjam_id', $currentUser->id);


        // check apakah user sudah ada di table user_mengantri_pengembalian_buku dengan idBuku sama
        if($tableUserMengantriPengembalian->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count()){
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah mengantri!',
            ], 422);
        }

        // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
        if($tableLaporanPeminjamanBukuBerlangsung->get()->count() == false){
            return response()->json([
                'success' => false,
                'message' => "Pengembalian gagal!",
            ], 400);
        }

        $laporanPeminjamanBerlangsung->update([
            'tanggal_pengembalian_peminjaman' => now(),
            'status_pengembalian' => $request->status_pengembalian,
            'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
            'updated_at' => now(),
        ]);

        DB::table('user_mengantri_pengembalian_buku')->insert([
            'buku_id' => $buku->id,
            'peminjam_id' => $currentUser->id,
            'tanggal_deadline_peminjaman' => $laporanPeminjamanBerlangsung->first()->tanggal_deadline_peminjaman,
            'tanggal_pengembalian_peminjaman' => now(),
            'status_pengembalian' => $request->status_pengembalian,
            'foto_buku_dikembalikan' => $request->foto_buku_dikembalikan,
            'created_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Antri pengembalian berhasil!',
        ], 200);
    }
}
