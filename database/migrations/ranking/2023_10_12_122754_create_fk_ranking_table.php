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
            $table->foreign('kode_alternatif', 'fk_ranking_kode_alternatif')
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
        Schema::table('ranking', function (Blueprint $table) {
            $table->dropForeign('fk_ranking_nama_alternatif');
        });
    }
};
