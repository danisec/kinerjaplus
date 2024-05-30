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
        Schema::create('skala_indikator_detail', function (Blueprint $table) {
            $table->id('id_skala_indikator_detail');
            $table->bigInteger('id_skala_indikator')->unsigned();
            $table->enum('skala', ['1', '2', '3', '4'])->index();
            $table->text('deskripsi_skala', 5000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skala_indikator_detail');
    }
};
