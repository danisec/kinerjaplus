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
        Schema::table('ranking', function (Blueprint $table) {
            $table->foreign('id_tanggal_penilaian', 'fk_id_tanggal_penilaian_ranking_id_tanggal_penilaian')
                ->references('id_tanggal_penilaian')
                ->on('tanggal_penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('ranking', function (Blueprint $table) {
            $table->foreign('kode_alternatif', 'fk_kode_alternatif_ranking_group_penilaian')
                ->references('alternatif_pertama')
                ->on('group_penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ranking', function (Blueprint $table) {
            $table->dropForeign('fk_id_tanggal_penilaian_ranking_id_tanggal_penilaian');
        });

        Schema::table('ranking', function (Blueprint $table) {
            $table->dropForeign('fk_kode_alternatif_ranking_group_penilaian');
        });
    }
};
