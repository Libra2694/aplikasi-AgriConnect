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
        Schema::create('informasi_petanis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['Hama', 'Penyakit', 'Tips', 'Cuaca', 'Lainnya']);
            $table->text('konten');
            $table->date('tanggal_terbit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_petanis');
    }
};
