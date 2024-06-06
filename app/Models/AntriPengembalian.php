<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntriPengembalian extends Model
{
    use HasFactory;

    protected $table = 'user_mengantri_pengembalian_buku';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
