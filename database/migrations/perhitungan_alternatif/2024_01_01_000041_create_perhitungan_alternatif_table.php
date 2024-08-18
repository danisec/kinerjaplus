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
        Schema::create('perhitungan_alternatif', function (Blueprint $table) {  
            $table->id('id_perhitungan_alternatif');
            $table->unsignedBigInteger('id_tanggal_penilaian');
            $table->string('kode_kriteria', 3);
            $table->string('alternatif_pertama', 4);
            $table->string('alternatif_kedua', 4);
            $table->double('nilai_alternatif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_alternatif');
    }
};
