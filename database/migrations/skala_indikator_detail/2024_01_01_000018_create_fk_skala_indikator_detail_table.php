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
        Schema::table('skala_indikator_detail', function (Blueprint $table) {
            $table->foreign('id_skala_indikator', 'fk_skala_indikator_detail_id_skala_indikator')
                ->references('id_skala_indikator')
                ->on('skala_indikator')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('skala_indikator_detail', function (Blueprint $table) {
            $table->foreign('skala', 'fk_skala_indikator_detail_nilai_skala')
                ->references('skala')
                ->on('nilai_skala')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skala_indikator_detail', function (Blueprint $table) {
            $table->dropForeign('fk_skala_indikator_detail_id_skala_indikator');
        });

        Schema::table('skala_indikator_detail', function (Blueprint $table) {
            $table->dropForeign('fk_skala_indikator_detail_nilai_skala');
        });
    }
};
