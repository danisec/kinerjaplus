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
        Schema::create('catatan_kayawan', function (Blueprint $table) {
            $table->id('id_catatan_kayawan');
            $table->bigInteger('id_penilaian')->unsigned();
            $table->string('tahun_ajaran', 9);
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_karyawan');
    }
};
