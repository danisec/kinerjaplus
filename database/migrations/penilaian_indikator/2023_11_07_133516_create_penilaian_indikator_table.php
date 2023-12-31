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
        Schema::create('penilaian_indikator', function (Blueprint $table) {
            $table->id('id_penilaian_indikator');
            $table->unsignedBigInteger('id_penilaian');
            $table->unsignedBigInteger('id_skala_indikator_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_indikator');
    }
};
