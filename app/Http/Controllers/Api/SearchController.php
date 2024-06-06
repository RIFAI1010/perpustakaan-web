<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function penulis(string $slug)
    {
        $penulis = Penulis::where('slug', $slug)->firstOrFail();
        return response()->json([
            'success' => true,
            'message' => "List Buku ditulis oleh $slug",
            'bukus' => DB::table('penulis_buku')->where('penulis_id', $penulis),
        ], 200);
    }
}
