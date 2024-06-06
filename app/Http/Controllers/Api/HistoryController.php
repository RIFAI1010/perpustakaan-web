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
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $laporanTransaksiPeminjamanBuku = LaporanTransaksiPeminjamanBuku::where('peminjam_id', $request->user_id)->get();

        // org code
        // foreach ($laporanTransaksiPeminjamanBuku as $data) {
        //     array_push($bukuSudahDipinjam, $data->buku);
        // }
        $bukuSudahDipinjam = $laporanTransaksiPeminjamanBuku->map(
            function($data){
                return $data->buku;
            }
        )->unique();

        return response()->json([
            'success' => true,
            'message' => 'History User',
            'sedang_dipinjam' => Buku::where('peminjam_id', $request->user_id)->get(),
            'sudah_dipinjam' => $bukuSudahDipinjam,
        ], 200);
    }
}
