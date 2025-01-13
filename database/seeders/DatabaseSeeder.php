<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama_admin' => 'Test User',
            'username' => 'admin',
            'password' => bcrypt('12345'),
        ]);

        \App\Models\Pelanggan::create([
            'username' => 'pelanggan',
            'password' => bcrypt('12345'), // Pastikan menggunakan bcrypt untuk hashing password
            'nama_pelanggan' => 'Test User',
            'alamat_pelanggan' => 'Jl. Contoh Alamat, No. 123',
            'email_pelanggan' => 'test@example.com',
            'telepon_pelanggan' => '081234567890',
        ]);
    }
}
