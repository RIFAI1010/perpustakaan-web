<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\LaporanTransaksiPeminjamanBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        //define validation rules
        // $validator = Validator::make($request->all(), [
        //     'user_id' => 'required',
        // ]);

        // //check if validation fails
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $laporanTransaksiPeminjamanBuku = LaporanTransaksiPeminjamanBuku::where('peminjam_id', $currentUser->id)->get();
        
        $bukuSudahDipinjam = $laporanTransaksiPeminjamanBuku->map(
            function($data){
                return $data->buku;
            }
        )->unique();

        return response()->json([
            'success' => true,
            'message' => 'History User',
            'sedang_dipinjam' => Buku::where('peminjam_id', $currentUser->id)->get(),
            'sudah_dipinjam' => $bukuSudahDipinjam,
        ], 200);
    }
}
