<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class DetailBukuController extends Controller
{
    public function index(string $slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $statusBuku = '';

        if ($buku->is_mengantri_peminjaman_api()) {
            $statusBuku = 'mengantri_peminjaman';
        } elseif ($buku->is_dipinjam_api()) {
            $statusBuku = 'dipinjam';
        } elseif ($buku->is_mengantri_pengembalian_api()) {
            $statusBuku = 'mengantri_pengembalian';
        } elseif ($buku->is_mengantri_denda_api()) {
            $statusBuku = 'mengantri_denda';
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Buku',
            'buku' => $buku,
            'penulis' => $buku->penulis()->get()[0]->nama ?? 'Tidak diketahui',
            'penerbit' => $buku->category()->get()[0]->nama ?? 'Tidak diketahui',
            'category' => $buku->penerbit()->get()[0]->nama ?? 'Tidak diketahui',
            'status_buku' => $statusBuku,
            // tambahin response review
        ], 200);
    }
}
