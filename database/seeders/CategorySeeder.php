<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'nama' => 'Action',
            'slug' => 'action',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Comedy',
            'slug' => 'comedy',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Drama',
            'slug' => 'drama',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Fantasy',
            'slug' => 'fantasi',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Sci-Fi',
            'slug' => 'sci_fi',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Music',
            'slug' => 'music',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Romance',
            'slug' => 'romance',
        ]);
        DB::table('categories')->insert([
            'nama' => 'School',
            'slug' => 'school',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Slice Of Life',
            'slug' => 'slice_of_life',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Horror',
            'slug' => 'horror',
        ]);
        DB::table('categories')->insert([
            'nama' => 'Mystery',
            'slug' => 'mystery',
        ]);
    }
}
