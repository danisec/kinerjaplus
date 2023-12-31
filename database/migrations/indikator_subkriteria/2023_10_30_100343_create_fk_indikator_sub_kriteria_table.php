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
        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->foreign('kode_kriteria', 'fk_indikator_subkriteria_kode_kriteria')
                ->references('kode_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->foreign('kode_subkriteria', 'fk_indikator_subkriteria_kode_subkriteria')
                ->references('kode_subkriteria')
                ->on('subkriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_indikator_subkriteria_kode_kriteria');
        });

        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_indikator_subkriteria_kode_subkriteria');
        });
    }
};
