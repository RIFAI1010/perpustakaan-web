<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class DetailBukuController extends Controller
{
    public function index(string $slug)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Buku',
            'buku' => Buku::where('slug', $slug)->firstOrFail(),
            // tambahin response review
            // status bukunya terhadap orang (dipinjam, sedang mengantri peminjaman, sedang mengantri pengembalian)
        ], 200);
    }
}
