<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class HomePageController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'List Buku',
            'bukus' => Buku::all(),
        ], 200);
    }
}
