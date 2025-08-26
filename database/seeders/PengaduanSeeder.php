<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengaduans')->truncate();

        $mahasiswa1 = User::where('nim', '2023001')->first();
        $mahasiswa2 = User::where('nim', '2023002')->first();

        // Data pengaduan
        $pengaduans = [
            [
                'user_id' => $mahasiswa1->id,
                'nomor_tiket' => 'TK' . Str::upper(Str::random(8)),
                'judul' => 'Wi-Fi Kampus Sangat Lambat',
                'kategori' => 'Fasilitas Umum',
                'deskripsi' => 'Wi-Fi di gedung A sangat lambat dan sering terputus. Mohon diperbaiki.',
                'bukti' => null,
                'prioritas' => 'Tinggi',
                'anonim' => false,
                'status' => 'dikirim',
                'rating' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $mahasiswa2->id,
                'nomor_tiket' => 'TK' . Str::upper(Str::random(8)),
                'judul' => 'Toilet Lantai 3 Kotor',
                'kategori' => 'Kebersihan',
                'deskripsi' => 'Toilet di lantai 3 gedung B kotor dan airnya tidak mengalir.',
                'bukti' => null,
                'prioritas' => 'Sedang',
                'anonim' => false,
                'status' => 'diproses',
                'rating' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $mahasiswa1->id,
                'nomor_tiket' => 'TK' . Str::upper(Str::random(8)),
                'judul' => 'Kesalahan Transkrip Nilai',
                'kategori' => 'Administrasi',
                'deskripsi' => 'Ada kesalahan pada transkrip nilai saya, salah satu mata kuliah tidak tercantum.',
                'bukti' => null,
                'prioritas' => 'Tinggi',
                'anonim' => false,
                'status' => 'selesai',
                'rating' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $mahasiswa2->id,
                'nomor_tiket' => 'TK' . Str::upper(Str::random(8)),
                'judul' => 'Jaring Gawang Robek',
                'kategori' => 'Sarana Olahraga',
                'deskripsi' => 'Jaring gawang di lapangan futsal robek, sudah lama tidak diganti.',
                'bukti' => null,
                'prioritas' => 'Rendah',
                'anonim' => true,
                'status' => 'dikirim',
                'rating' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pengaduans')->insert($pengaduans);
    }
}