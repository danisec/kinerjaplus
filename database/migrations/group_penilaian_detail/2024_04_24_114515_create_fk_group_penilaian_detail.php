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
        Schema::table('group_penilaian_detail', function (Blueprint $table) {
            $table->foreign('id_group_penilaian', 'fk_id_group_penilaian_penilaian')
                ->references('id_group_penilaian')
                ->on('group_penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('group_penilaian_detail', function (Blueprint $table) {
            $table->foreign('alternatif_kedua', 'fk_alternatif_kedua_alternatif')
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
        Schema::table('group_penilaian_detail', function (Blueprint $table) {
            $table->dropForeign('fk_id_group_penilaian_penilaian');
        });

        Schema::table('group_penilaian_detail', function (Blueprint $table) {
            $table->dropForeign('fk_alternatif_kedua_alternatif');
        });
    }
};
