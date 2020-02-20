<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmActorModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_actor', function (Blueprint $table) {
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->unsignedBigInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');
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
        Schema::dropIfExists('film_actor_models');
    }
}
