<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AntriPeminjamanController extends Controller
{
    public function index(Request $request, string $slug)
    {
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
        $tableUserMengantriPeminjamanBuku = DB::table('user_mengantri_peminjaman_buku');
        $tableLaporanPeminjamanBukuBerlangsung = DB::table('laporan_peminjaman_buku_berlangsung');

        // kalo denda gak bisa 

        // check apakah user sudah ada di table user_mengantri_peminjaman_buku dengan idBuku sama
        if($tableUserMengantriPeminjamanBuku->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count()){
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah mengantri!',
            ], 422);
        }

        // check apakah user sedang meminjam buku yg sama
        if(Buku::where('slug', $slug)->where('peminjam_id', $currentUser->id)->get()->count()){
            return response()->json([
                'success' => false,
                'message' => "Anda sedang meminjam buku $buku->judul!",
            ], 406);
        }

        // check apakah user sudah ada di table laporan_peminjaman_buku_berlangsung dengan idBuku sama
        if($tableLaporanPeminjamanBukuBerlangsung->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->get()->count()){
            return response()->json([
                'success' => false,
                'message' => "Peminjaman gagal!",
            ], 400);
        }
        

        DB::table('user_mengantri_peminjaman_buku')->insert([
            'buku_id' => $buku->id,
            'peminjam_id' => $request->user_id,
            'tanggal_pengajuan_peminjaman' => now(),
            'created_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Antri peminjaman berhasil!",
        ], 200);
    }

    public function batal_antri(Request $request, string $slug)
    {
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
        $tableUserMengantriPeminjamanBuku = DB::table('user_mengantri_peminjaman_buku')
            ->where('buku_id', $buku->id)
            ->where('peminjam_id', $currentUser->id);


        // check apakah mengantri
        if($tableUserMengantriPeminjamanBuku->get()->count() == false){
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak mengantri!',
            ], 422);
        }
        
        $tableUserMengantriPeminjamanBuku->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil membatalkan antrian!',
        ], 200);
    }
}