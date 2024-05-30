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
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('alternatif_pertama', 'fk_alternatif_pertama_group_penilaian')
                ->references('alternatif_pertama')
                ->on('group_penilaian')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('alternatif_kedua', 'fk_alternatif_kedua_group_penilaian')
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
        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_alternatif_pertama_group_penilaian');
        });

        Schema::table('penilaian', function (Blueprint $table) {
            $table->dropForeign('fk_alternatif_kedua_group_penilaian');
        });
    }
};
