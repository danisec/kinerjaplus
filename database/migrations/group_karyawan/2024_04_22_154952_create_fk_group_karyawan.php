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
        Schema::table('group_karyawan', function (Blueprint $table) {
            $table->foreign('kepala_sekolah', 'fk_kepala_sekolah_alternatif')
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
        Schema::table('group_karyawan', function (Blueprint $table) {
            $table->dropForeign('fk_kepala_sekolah_alternatif');
        });
    }
};
