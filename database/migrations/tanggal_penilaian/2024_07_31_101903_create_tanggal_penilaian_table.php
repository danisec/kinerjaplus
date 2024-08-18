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
        Schema::create('tanggal_penilaian', function (Blueprint $table) {
            $table->id('id_tanggal_penilaian');
            $table->unsignedBigInteger('id_group_karyawan');
            $table->string('tahun_ajaran', 9);
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->date('awal_tanggal_penilaian');
            $table->date('akhir_tanggal_penilaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggal_penilaian');
    }
};
