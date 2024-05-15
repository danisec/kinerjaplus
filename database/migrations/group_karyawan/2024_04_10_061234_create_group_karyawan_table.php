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
        Schema::create('group_karyawan', function (Blueprint $table) {
            $table->id('id_group_karyawan');
            $table->string('nama_group_karyawan', 50);
            $table->string('kepala_sekolah', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_karyawan');
    }
};
