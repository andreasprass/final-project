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
        Schema::create('scorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->integer('score')->default('0');
            $table->foreignId('criteria_id')->nullable();
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
        Schema::dropIfExists('scorings');
    }
};
