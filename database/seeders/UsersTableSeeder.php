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
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'petugas',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);

        User::create([
            'username' => 'siswa',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
    }
}
