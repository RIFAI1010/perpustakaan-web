<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Buku extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'bukus';
    protected $guarded = [];
    
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_buku');
    }

    public function penulis()
    {
        return $this->belongsToMany(Penulis::class, 'penulis_buku');
    }

    // for auth user
    public function is_mengantri_peminjaman()
    {
        $currentUser = Auth::user();
        return DB::table('user_mengantri_peminjaman_buku')->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }
    // public function panjang_mengantri_peminjaman()
    // {
    //     $currentUser = Auth::user();
    //     $data = DB::table('user_mengantri_peminjaman_buku')->where('buku_id', $this->id)
    //         ->where('peminjam_id', $currentUser->id)
    //         ->pluck('buku_id');
    //     return [$data];
    // }
    // public function data_mengantri_peminjaman($urut)
    // {
    //     $currentUser = Auth::user();
    //     $data = DB::table('user_mengantri_peminjaman_buku')->where('buku_id', $this->id)
    //         ->where('peminjam_id', $currentUser->id)
    //         ->pluck('buku_id')[$urut];
    //     return [$data];
    // }

    public function is_dipinjam()
    {
        $currentUser = Auth::user();
        return DB::table('bukus')
            ->where('id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }

    // public function data_dipinjam_panjang()
    // {
    //     $currentUser = Auth::user();
    //     $bukus = Buku::where('peminjam_id', $currentUser->id)->get('');

    //     return $bukus;
    // }
    // public function data_dipinjam($urut)
    // {
    //     $currentUser = Auth::user();
    //     $judul = DB::table('bukus')->where('id', $this->id)->where('peminjam_id', $currentUser->id)->pluck('judul')[$urut];

    //     return [$judul];
    // }


    public function is_mengantri_pengembalian()
    {
        $currentUser = Auth::user();
        return DB::table('user_mengantri_pengembalian_buku')
            ->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }
    public function is_mengantri_denda()
    {
        $currentUser = Auth::user();
        return DB::table('laporan_peminjaman_buku_berlangsung')
            ->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }

    public function is_ditandai() {
        $currentUser = Auth::user();
        return DB::table('user_menandai_buku')
            ->where('buku_id', $this->id)
            ->where('user_id', $currentUser->id)
            ->exists();
    }

    //sudah pernah pinjam
    public function is_rating() {
        $currentUser = Auth::user();
        return DB::table('laporan_transaksi_peminjaman_buku')
            ->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }
    public function is_sudah_rating() {
        $currentUser = Auth::user();
        return DB::table('user_merating_buku')
            ->where('buku_id', $this->id)
            ->where('user_id', $currentUser->id)
            ->exists();
    }
    public function is_rating_ratarata(string $slug) {
        // Mendapatkan ID buku berdasarkan slug
        $buku = Buku::where('slug', $slug)->firstOrFail();
    
        // Menghitung rata-rata nilai rating untuk buku dengan ID tersebut
        $avgRating = DB::table('user_merating_buku')
            ->where('buku_id', $buku->id)
            ->avg('nilai');
    
        // Mengembalikan nilai rata-rata rating sebagai desimal
        return number_format($avgRating, 1, '.', '');
    }
    

    // for api
    public function is_mengantri_peminjaman_api()
    {
        $currentUser = auth()->user();
        
        if (!$currentUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return DB::table('user_mengantri_peminjaman_buku')
            ->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }


    public function is_dipinjam_api()
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return DB::table('bukus')
            ->where('id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }

    public function is_mengantri_pengembalian_api()
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return DB::table('user_mengantri_pengembalian_buku')
            ->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }

    public function is_mengantri_denda_api()
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return DB::table('laporan_peminjaman_buku_berlangsung')
            ->where('buku_id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
