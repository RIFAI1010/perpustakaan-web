<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Penulis;
use App\Models\Category;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Auth;

class SiswaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $rating = DB::table('user_merating_buku')
        ->where('buku_id', $buku->id)
        ->join('users', 'user_merating_buku.user_id', '=', 'users.id')
        ->select('user_merating_buku.*', 'users.*') // Pilih kolom-kolom yang ingin ditampilkan dari users
        ->get();
        return view('siswa.buku_show', [
            'buku' => $buku,
            'rating' => $rating,
        ]);
    }

    public function rating(string $slug, Request $request)
    {
        $currentUser = Auth::user();
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $tableLaporanTransaksi = DB::table('laporan_transaksi_peminjaman_buku');
        $tableUserMerating = DB::table('user_merating_buku');

        //validasi ganda dari frondend
        if($tableLaporanTransaksi ->where('buku_id', $buku->id)->where('peminjam_id', $currentUser->id)->exists() == 0){
            return back()->with(['failed' => 'Anda belum pernah meminjam buku ini!']);
        }
        if($tableUserMerating ->where('buku_id', $buku->id)->where('user_id', $currentUser->id)->exists()){
            return back()->with(['failed' => 'Anda sudah merating buku ini!']);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komen' => 'required|string|max:255',
        ]);

        DB::table('user_merating_buku')->insert([
            'user_id' => $currentUser->id, // assuming the user is authenticated
            'buku_id' => $buku->id,
            'nilai' => $request->input('rating'),
            'komen' => $request->input('komen'),
        ]);

        return back()->with('success', 'Rating dan komen berhasi!');
    }
}
