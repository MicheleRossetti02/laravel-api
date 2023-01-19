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
        Schema::create('song_tecnology', function (Blueprint $table) {
            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('id')->on('songs')->cascadeOnDelete();

            $table->unsignedBigInteger('tecnology_id');
            $table->foreign('tecnology_id')->references('id')->on('technologies')->cascadeOnDelete();

            $table->primary('song_id', 'tecnology_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_tecnology');
    }
};
