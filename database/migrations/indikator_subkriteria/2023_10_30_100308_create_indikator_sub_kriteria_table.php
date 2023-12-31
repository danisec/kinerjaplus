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
        Schema::create('indikator_subkriteria', function (Blueprint $table) {
            $table->id('id_indikator_subkriteria');
            $table->string('kode_kriteria', 3);
            $table->string('kode_subkriteria', 4);
            $table->string('indikator_subkriteria', 2000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_subkriteria');
    }
};
