<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;


class SiswaTransaksiController extends Controller
{
    public function peminjaman() {
        return view('siswa.peminjaman', [
            'buku' => Buku::all()->firstOrFail(),
        ]);
    }
}
