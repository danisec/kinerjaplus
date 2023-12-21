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
        Schema::table('bobot_prioritas_subkriteria', function (Blueprint $table) {
            $table->foreign('id_subkriteria', 'fk_bobot_prioritas_subkriteria_subkriteria')
                ->references('id_subkriteria')
                ->on('subkriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bobot_prioritas_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_bobot_prioritas_subkriteria_subkriteria');
        });
    }
};
