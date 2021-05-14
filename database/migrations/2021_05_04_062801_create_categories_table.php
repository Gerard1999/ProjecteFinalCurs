<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            //Clau forana de Curses
            $table->bigInteger('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');;

            $table->char('name_category', 50);
            $table->float('kms');
            $table->integer('elevation_gain');
            $table->char('location_start', 50);
            $table->char('location_finish', 50);
            $table->time('start_time', $precision = 0);
            $table->integer('num_aid_station');
            $table->float('price');
            $table->integer('max_participants');


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
        Schema::dropIfExists('categories');
    }
}
