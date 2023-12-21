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
        Schema::table('perhitungan_subkriteria', function (Blueprint $table) {
            $table->foreign('subkriteria_pertama', 'fk_perhitungan_subkriteria_subkriteria_pertama')
                ->references('kode_subkriteria')
                ->on('subkriteria')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::table('perhitungan_subkriteria', function (Blueprint $table) {
            $table->foreign('subkriteria_kedua', 'fk_perhitungan_subkriteria_subkriteria_kedua')
                ->references('kode_subkriteria')
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
        Schema::table('perhitungan_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_perhitungan_subkriteria_subkriteria_pertama');
        });

        Schema::table('perhitungan_subkriteria', function (Blueprint $table) {
            $table->dropForeign('fk_perhitungan_subkriteria_subkriteria_kedua');
        });
    }
};
