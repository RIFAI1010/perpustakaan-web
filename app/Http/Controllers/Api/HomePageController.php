<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();

        return response()->json([
            'success' => true,
            'message' => 'List Buku',
            'bukus' => $bukus,
        ], 200);
    }
}
