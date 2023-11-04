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
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_subkriteria');
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
