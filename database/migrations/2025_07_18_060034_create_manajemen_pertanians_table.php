<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('manajemen_pertanians', function (Blueprint $table) {
        $table->id();
        $table->string('nama_petani');
        $table->string('komoditas');
        $table->decimal('luas_lahan', 8, 2);
        $table->string('jenis_pupuk');
        $table->date('tanggal_tanam');
        $table->string('lokasi');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_pertanians');
    }
};
