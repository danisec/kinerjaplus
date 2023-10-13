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
       Schema::table('bobot_prioritas_kriteria', function (Blueprint $table) {
            $table->foreign('id_kriteria', 'fk_bobot_prioritas_kriteria_kriteria')
                ->references('id_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bobot_prioritas_kriteria', function (Blueprint $table) {
            $table->dropForeign('fk_bobot_prioritas_kriteria_kriteria');
        });
    }
};
