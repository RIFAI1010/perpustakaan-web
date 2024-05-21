<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'image' => 'kocak.png',
            'first_name' => fake()->firstNameMale(),
            'last_name' => fake()->lastName(),
            'username' => 'opalkerenbat',
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => '087772986753',
            'password' => Hash::make('password'),
            'class' => 'XI',
            'role' => 'siswa',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
