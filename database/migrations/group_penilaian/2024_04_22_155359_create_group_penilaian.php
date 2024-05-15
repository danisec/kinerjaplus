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
        Schema::create('group_penilaian', function (Blueprint $table) {
            $table->id('id_group_penilaian');
            $table->bigInteger('id_group_karyawan')->unsigned();
            $table->string('alternatif_pertama', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_penilaian');
    }
};
