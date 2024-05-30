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
        Schema::table('catatan_karyawan', function (Blueprint $table) {
            $table->foreign('id_penilaian', 'fk_id_penilaian_penilaian')
                ->references('id_penilaian')
                ->on('penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catatan_karyawan', function (Blueprint $table) {
            $table->dropForeign('fk_id_penilaian_penilaian');
        });
    }
};
