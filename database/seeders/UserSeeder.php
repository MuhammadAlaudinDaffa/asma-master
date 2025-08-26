<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk mencegah duplikasi
        User::truncate();

        // Buat Akun Admin
        User::create([
            'name' => 'Admin AsMa',
            'nim' => '12345678',
            'email' => 'admin@asma.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat Akun Mahasiswa
        User::create([
            'name' => 'Mahasiswa 1',
            'nim' => '2023001',
            'email' => 'mhs1@asma.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
        
        User::create([
            'name' => 'Mahasiswa 2',
            'nim' => '2023002',
            'email' => 'mhs2@asma.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
        
        User::create([
            'name' => 'Mahasiswa 3',
            'nim' => '2023003',
            'email' => 'mhs3@asma.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);

        // Anda bisa tambahkan lebih banyak akun mahasiswa di sini
        // User::factory()->count(10)->create(); // Menggunakan factory jika Anda sudah membuatnya
    }
}
