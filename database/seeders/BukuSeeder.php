<?php

namespace Database\Seeders;

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
        DB::table('bukus')->insert([
            'id' => str::uuid(),
            'image' => 'omaga.jpg',
            'title' => 'Cara Membesarkan Otak Agar Supabase Menjadi Linear Algebra',
            'deskripsi' => 'Bersiwak bagus untuk membersihkan gigi',
            'isbn' => '123211230',
            'page_count' => 420,
            'language' => 'Indonesia',
            'average_rating' => 0,
            'ratings_count' => 69420,
            'published_date' => now(),
            'tipe' => 'E-Book',
            'status' => 1,
            'id_penerbit' => 'c602101f-cfcd-4ff8-b9d2-2b310d22f9e2',
        ]);
    }
}
