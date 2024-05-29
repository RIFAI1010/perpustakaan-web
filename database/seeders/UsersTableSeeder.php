<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'first_name' => 'Abdul',
            'last_name' => 'Usep',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'petugas',
            'first_name' => 'Rifai',
            'last_name' => 'Hari',
        'password' => Hash::make('password123'),
            'role' => 'staff',
        ]);

        User::create([
            'username' => 'siswa',
            'first_name' => 'Naufal',
            'last_name' => 'Parama',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
    }
}
