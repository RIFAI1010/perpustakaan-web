<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::create([
            'image' => 'kocick.jpg',
            'judul' => 'Cara Membesarkan Otak Agar Supabase Menjadi Linear Algebra',
            'slug' => 'cara_membesarkan_otak_agar_supabase_menjadi_linear_algebra',
            'deskripsi' => 'Bersiwak bagus untuk membersihkan gigi',
            'isbn' => '6969696969',
            'jumlah_halaman' => 123,
            'bahasa' => 'Indonesia',
            'rata_rata_rating' => 0.0,
            'jumlah_perating' => 69699,
            'tanggal_terbit' => now(),
            'tipe' => 'E-Book',
            'status_ketersediaan' => 1,

            'penerbit_id' => 1,
        ]);
    }
}
