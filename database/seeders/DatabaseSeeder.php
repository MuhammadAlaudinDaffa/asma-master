<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menonaktifkan Foreign Key Checks
        Schema::disableForeignKeyConstraints();

        $this->call([
            UserSeeder::class,
            PengaduanSeeder::class,
        ]);

        // Mengaktifkan kembali Foreign Key Checks
        Schema::enableForeignKeyConstraints();
    }
}