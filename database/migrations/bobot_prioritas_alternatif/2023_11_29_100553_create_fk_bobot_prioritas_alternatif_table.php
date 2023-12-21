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
        Schema::table('bobot_prioritas_alternatif', function (Blueprint $table) {
            $table->foreign('kode_kriteria', 'fk_bobot_prioritas_alternatif_kriteria')
                ->references('kode_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

       Schema::table('bobot_prioritas_alternatif', function (Blueprint $table) {
            $table->foreign('kode_alternatif', 'fk_bobot_prioritas_alternatif_alternatif')
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
        Schema::table('bobot_prioritas_alternatif', function (Blueprint $table) {
            $table->dropForeign('fk_bobot_prioritas_alternatif_kriteria');
        });

        Schema::table('bobot_prioritas_alternatif', function (Blueprint $table) {
            $table->dropForeign('fk_bobot_prioritas_alternatif_alternatif');
        });
    }
};
