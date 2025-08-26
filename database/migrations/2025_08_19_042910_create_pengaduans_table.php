<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nomor_tiket')->unique();
            $table->string('judul');
            $table->string('kategori');
            $table->text('deskripsi');
            $table->string('bukti')->nullable();
            $table->integer('rating')->nullable();
            $table->enum('prioritas', ['Rendah', 'Sedang', 'Tinggi'])->default('Sedang'); // Kolom baru
            $table->boolean('anonim')->default(false);
            $table->enum('status', ['dikirim', 'diproses', 'selesai'])->default('dikirim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};