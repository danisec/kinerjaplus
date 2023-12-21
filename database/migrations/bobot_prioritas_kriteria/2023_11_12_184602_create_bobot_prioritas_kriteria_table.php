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
        Schema::create('bobot_prioritas_kriteria', function (Blueprint $table) {
            $table->id('id_bobot_prioritas_kriteria');
            $table->unsignedBigInteger('id_kriteria');
            $table->double('bobot_prioritas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_prioritas_kriteria');
    }
};
