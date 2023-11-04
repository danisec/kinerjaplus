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
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->id('id_subkriteria');
            $table->unsignedBigInteger('id_kriteria');
            $table->string('kode_subkriteria', 4);
            $table->string('nama_subkriteria', 255);
            $table->string('deskripsi_subkriteria', 2000);
            $table->double('bobot_subkriteria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkriteria');
    }
};
