<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imdb_id')->nullable(true);
            $table->string('title');
            $table->string('year', 10)->nullable(true);
            $table->string('rated')->nullable(true);
            $table->string('released', 40)->nullable(true);
            $table->string('runtime', 10)->nullable(true);
            $table->text('plot');
            $table->string('awards')->nullable(true);
            $table->string('poster')->nullable(true);
            $table->text('ratings')->nullable(true);
            $table->string('meta_score', 10)->nullable(true);
            $table->string('imdb_rating', 10)->nullable(true);
            $table->string('imdb_votes', 20)->nullable(true);
            $table->string('type', 30)->nullable(true);
            $table->string('dvd_release_date', 50)->nullable(true);
            $table->string('box_office', 50)->nullable(true);
            $table->string('production')->nullable(true);
            $table->string('website')->nullable(true);
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
        Schema::dropIfExists('movies');
    }
}
