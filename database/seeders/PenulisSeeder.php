<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penulis')->insert([
            'id' => 'pppppppp-pppp-pppp-pppp-ppppppppplis',
            'name' => 'Mamang Samele',
        ]);
    }
}
