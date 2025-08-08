<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('petani_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_produk');
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->integer('harga_per_kg');
            $table->integer('stok_kg');
            $table->string('satuan', 20);
            $table->string('gambar')->nullable();
            $table->enum('status_produk', ['Tersedia', 'Habis', 'Nonaktif'])->default('Tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
