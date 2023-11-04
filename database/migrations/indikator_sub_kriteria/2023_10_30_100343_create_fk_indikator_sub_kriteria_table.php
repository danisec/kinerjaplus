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
        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->foreign('id_kriteria', 'fk_indikator_subkriteria_id_kriteria')
                ->references('id_kriteria')
                ->on('kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->foreign('id_subkriteria', 'fk_indikator_subkriteria_id_subkriteria')
                ->references('id_subkriteria')
                ->on('sub_kriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_indikator_subkriteria_id_kriteria');
        });

        Schema::table('indikator_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_indikator_subkriteria_id_subkriteria');
        });
    }
};
