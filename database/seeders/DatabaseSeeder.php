<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bidang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Bidang::create([
            'nama' => 'TIK'
        ]);

        User::create([
            'name' => 'Admin Diskominfo',
            'email' => 'diskominfojateng@gmail.com',
            'bidang_id' => 1,
            'password' => bcrypt('diskominfo123'), // Kata sandi dienkripsi menggunakan bcrypt
        ]);
    }
}
