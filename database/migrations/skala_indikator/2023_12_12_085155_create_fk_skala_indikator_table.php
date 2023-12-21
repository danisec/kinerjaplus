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
        Schema::table('skala_indikator', function (Blueprint $table) {
            $table->foreign('id_indikator_subkriteria', 'fk_skala_indikator_id_indikator_subkriteria')
                ->references('id_indikator_subkriteria')
                ->on('indikator_subkriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skala_indikator', function (Blueprint $table) {
            $table->dropForeign('fk_skala_indikator_id_indikator_subkriteria');
        });
    }
};
