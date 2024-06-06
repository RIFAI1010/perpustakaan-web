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

    public function is_dipinjam()
    {
        $currentUser = Auth::user();
        return DB::table('bukus')
            ->where('id', $this->id)
            ->where('peminjam_id', $currentUser->id)
            ->exists();
    }
    
    public function is_mengantri_pengembalian()
    {
        $currentUser = Auth::user();
        return DB::table('user_mengantri_pengembalian_buku')
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
