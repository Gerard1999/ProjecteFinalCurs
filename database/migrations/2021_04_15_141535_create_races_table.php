<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->bigIncrements('id');

            //Clau forana de Organizers
            $table->bigInteger('organizer_id')->unsigned();
            
            $table->char('name', 25);
            $table->string('description',800);
            $table->string('url');
            $table->boolean('shirt');
            $table->date('date')->format('d M Y');
            $table->char('location', 100);
            $table->string('img_cover');
            
            $table->timestamps();
            
            $table->foreign('organizer_id')->references('id')->on('organizers');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
}
