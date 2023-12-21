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
        Schema::create('bobot_prioritas_subkriteria', function (Blueprint $table) {
            $table->id('id_bobot_prioritas_subkriteria');
            $table->unsignedBigInteger('id_subkriteria');
            $table->double('bobot_prioritas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_prioritas_subkriteria');
    }
};
