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
        Schema::create('group_karyawan_detail', function (Blueprint $table) {
            $table->id('id_group_karyawan_detail');
            $table->bigInteger('id_group_karyawan')->unsigned();
            $table->string('kode_alternatif', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_karyawan_detail');
    }
};
