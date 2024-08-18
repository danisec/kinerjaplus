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
        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->foreign('id_tanggal_penilaian', 'fk_perhitungan_alternatif_id_tanggal_penilaian')
                ->references('id_tanggal_penilaian')
                ->on('tanggal_penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->foreign('kode_kriteria', 'fk_perhitungan_alternatif_kode_kriteria')
                ->references('kode_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->foreign('alternatif_pertama', 'fk_perhitungan_alternatif_alternatif_pertama')
                ->references('alternatif_pertama')
                ->on('group_penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->foreign('alternatif_kedua', 'fk_perhitungan_alternatif_alternatif_kedua')
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
        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->dropForeign('fk_perhitungan_alternatif_id_tanggal_penilaian');
        });

        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->dropForeign('fk_perhitungan_alternatif_kode_kriteria');
        });

        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->dropForeign('fk_perhitungan_alternatif_alternatif_pertama');
        });

        Schema::table('perhitungan_alternatif', function (Blueprint $table) {
            $table->dropForeign('fk_perhitungan_alternatif_alternatif_kedua');
        });
    }
};
