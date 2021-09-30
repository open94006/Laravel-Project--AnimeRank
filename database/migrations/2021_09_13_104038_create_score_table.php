<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('anime_id')->unsigned();
            $table->foreign('anime_id')->references('id')->on('anime');
            $table->tinyInteger('worldview');
            $table->tinyInteger('figure');
            $table->tinyInteger('script');
            $table->tinyInteger('produce');
            $table->tinyInteger('will');
            $table->tinyInteger('durable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score');
    }
}