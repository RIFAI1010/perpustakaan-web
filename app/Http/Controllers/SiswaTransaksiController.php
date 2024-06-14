<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SiswaTransaksiController extends Controller
{
    public function peminjaman() {
        $currentUser = Auth::user();
        return view('siswa.peminjaman', [
            'is_mengantri_peminjaman' => DB::table('user_mengantri_peminjaman_buku')->where('peminjam_id', $currentUser->id)->get(),
            'is_dipinjam' =>DB::table('bukus')->where('peminjam_id', $currentUser->id)->get(),
        ]);
    }
}
