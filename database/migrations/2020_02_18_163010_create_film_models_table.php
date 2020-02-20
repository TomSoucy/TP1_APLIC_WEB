<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('release_year',4);
            $table->tinyInteger('language_id');
            $table->smallInteger('length')->nullable();
            $table->enum('rating', ['G', 'PG','PG-13','R','NC-17'])->nullable()->default('G');
            $table->set('special_features',['Trailers','Commentaries','Deleted Scenes','Behind the Scenes'])->nullable();
            $table->string('image')->nullable();
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film');
    }
}
