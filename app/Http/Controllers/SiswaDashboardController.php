<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Penulis;
use App\Models\Category;
use App\Models\Penerbit;

class SiswaDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.buku_show');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return view('siswa.buku_show', [
            'buku' => Buku::where('slug', $slug)->firstOrFail(),
        ]);
    }

 
}
