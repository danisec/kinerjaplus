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
        Schema::table('perhitungan_kriteria', function (Blueprint $table) {
            $table->foreign('kriteria_pertama', 'fk_kriteria_pertama')
                ->references('kode_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('perhitungan_kriteria', function (Blueprint $table) {
            $table->foreign('kriteria_kedua', 'fk_kriteria_kedua')
                ->references('kode_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign('fk_kriteria_pertama');
        });

        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign('fk_kriteria_kedua');
        });
    }
};
