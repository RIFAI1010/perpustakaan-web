<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class DetailBukuController extends Controller
{
    public function index(string $slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();

        return response()->json([
            'success' => true,
            'message' => 'Detail Buku',
            'buku' => $buku,
            // tambahin response review
        ], 200);
    }
}
