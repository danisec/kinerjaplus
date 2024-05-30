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
        Schema::create('perhitungan_kriteria', function (Blueprint $table) {
            $table->id('id_perhitungan_kriteria');
            $table->string('kriteria_pertama', 3);
            $table->string('kriteria_kedua', 3);
            $table->double('nilai_kriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_kriteria');
    }
};
