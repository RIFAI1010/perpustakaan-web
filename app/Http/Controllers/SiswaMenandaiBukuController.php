<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiswaMenandaiBukuController extends Controller
{
    public function index() {
        $currentUser = Auth::user();
        $tableUserMenandaiBuku = DB::table('user_menandai_buku')
        ->where('user_id', $currentUser->id)->pluck('buku_id');
        return view('siswa.ditandai',['bukus' => Buku::whereIn('id', $tableUserMenandaiBuku)->get()]);
    }

    public function menandai(string $slug) {
        $currentUser = Auth::user();
        $buku = Buku::where('slug', $slug)->firstOrFail();
        $tableUserMenandaiBuku = DB::table('user_menandai_buku')
        ->where('buku_id', $buku->id)
        ->where('user_id', $currentUser->id);

        if($tableUserMenandaiBuku->where('buku_id', $buku->id)->where('user_id', $currentUser->id)->get()->count()){
            $tableUserMenandaiBuku->delete();
            return back()->with(['success' => 'Berhenti Menandai Buku']);
        }
        else {
            DB::table('user_menandai_buku')->insert([
                'buku_id' => $buku->id,
                'user_id' => $currentUser->id,
            ]);
            return back()->with(['success' => 'Menandai Buku']);

        }

    
    }
}

