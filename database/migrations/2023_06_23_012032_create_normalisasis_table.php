<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normalisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kandidat_penilaian')->nullable();
            $table->float('nilai_normalisasi', 8,3);
            $table->foreignId('kriteria_penilaian')->nullable();
            $table->foreignId('id_rekap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normalisasis');
    }
};
