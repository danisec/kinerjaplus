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
        Schema::create('ratio_index', function (Blueprint $table) {
            $table->id('id_ratio_index');
            $table->unsignedBigInteger('ordo_matriks');
            $table->double('nilai_ratio_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratio_index');
    }
};
