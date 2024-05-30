<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Penulis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            PenerbitSeeder::class,
            PenulisSeeder::class,
            CategorySeeder::class,
            BukuSeeder::class,
        ]);

        DB::table('penulis_buku')->insert([
            'penulis_id' => 1,
            'buku_id' => 1,
        ]);
        
        DB::table('category_buku')->insert([
            'category_id' => 1,
            'buku_id' => 1,
        ]);
    }
}
