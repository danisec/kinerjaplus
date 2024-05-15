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
        Schema::table('group_penilaian', function (Blueprint $table) {
            $table->foreign('id_group_karyawan', 'fk_id_group_karyawan_group_penilaian_group_karyawan')
                ->references('id_group_karyawan')
                ->on('group_karyawan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('group_penilaian', function (Blueprint $table) {
            $table->foreign('alternatif_pertama', 'fk_alternatif_pertama_alternatif')
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
        Schema::table('group_penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_id_group_karyawan_group_penilaian_group_karyawan');
        });

        Schema::table('group_penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_alternatif_pertama_alternatif');
        });
    }
};
