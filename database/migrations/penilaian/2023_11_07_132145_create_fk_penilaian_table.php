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
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('alternatif_pertama', 'fk_penilaian_alternatif_pertama_alternatif_kode_alternatif')
                ->references('kode_alternatif')
                ->on('alternatif')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('alternatif_kedua', 'fk_penilaian_alternatif_kedua_alternatif_kode_alternatif')
                ->references('kode_alternatif')
                ->on('alternatif')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_penilaian_alternatif_pertama_alternatif_kode_alternatif');
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_penilaian_alternatif_kedua_alternatif_kode_alternatif');
        });
    }
};
