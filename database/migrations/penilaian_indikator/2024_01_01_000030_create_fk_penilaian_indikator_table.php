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
        Schema::table('penilaian_indikator', function (Blueprint $table) {
            $table->foreign('id_penilaian', 'fk_penilaian_id_penilaian_penilaian_id_penilaian')
                ->references('id_penilaian')
                ->on('penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('penilaian_indikator', function (Blueprint $table) {
            $table->foreign('id_skala_indikator_detail', 'fk_penilaian_id_skala_indikator_detail')
                ->references('id_skala_indikator_detail')
                ->on('skala_indikator_detail')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penilaian_indikator', function (Blueprint $table) {
            $table->dropForeign('fk_penilaian_id_penilaian_penilaian_id_penilaian');
        });

        Schema::table('penilaian_indikator', function (Blueprint $table) {
            $table->dropForeign('fk_penilaian_id_skala_indikator_detail');
        });
    }
};
