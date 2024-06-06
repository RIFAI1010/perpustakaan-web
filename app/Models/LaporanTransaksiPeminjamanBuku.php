<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanTransaksiPeminjamanBuku extends Model
{
    use HasFactory;
    
    protected $table = 'laporan_transaksi_peminjaman_buku';
    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
