<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiswaTransaksiController extends Controller
{
    public function peminjaman() {
        $currentUser = Auth::user();
        return view('siswa.peminjaman', [
            'bukus' => Buku::where('peminjam_id', $currentUser->id)->get(),
        ]);
    }
}
