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
        Schema::create('bobot_prioritas_alternatif', function (Blueprint $table) {
            $table->id('id_bobot_prioritas_alternatif');
            $table->unsignedBigInteger('id_tanggal_penilaian');
            $table->string('kode_kriteria', 3);
            $table->string('kode_alternatif', 4);
            $table->double('bobot_prioritas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_prioritas_alternatif');
    }
};
