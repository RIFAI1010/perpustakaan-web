<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaDashboardController extends Controller
{
    public function index() {
        return
        view('siswa.buku_all', [
            'categories' => Category::all(),
            'category_buku' => DB::table('category_buku')->get(),
            'bukus' => Buku::all(),
        ]);
        
    }   
}
