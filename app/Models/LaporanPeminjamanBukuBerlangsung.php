<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPeminjamanBukuBerlangsung extends Model
{
    use HasFactory;

    protected $table = 'laporan_peminjaman_buku_berlangsung';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
