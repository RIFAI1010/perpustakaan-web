<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
