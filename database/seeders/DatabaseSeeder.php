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
            UserSeeder::class,
            PenerbitSeeder::class,
            PenulisSeeder::class,
            CategorySeeder::class,
            BukuSeeder::class,
        ]);

        DB::table('penulis_buku')->insert([
            'id_penulis' => 'pppppppp-pppp-pppp-pppp-ppppppppplis',
            'id_buku' => 'pppppppp-pppp-pppp-pppp-pppppppppuku',
        ]);
        DB::table('category_buku')->insert([
            'id_category' => 'pppppppp-pppp-pppp-pppp-pppppppppris',
            'id_buku' => 'pppppppp-pppp-pppp-pppp-pppppppppuku',
        ]);
    }
}
