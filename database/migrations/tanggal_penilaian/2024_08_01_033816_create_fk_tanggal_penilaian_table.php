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
        Schema::table('tanggal_penilaian', function (Blueprint $table) {
            $table->foreign('id_group_karyawan', 'fk_tanggal_penilaian_id_group_karyawan')
                ->references('id_group_karyawan')
                ->on('group_karyawan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tanggal_penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_tanggal_penilaian_id_group_karyawan');
        });
    }
};
