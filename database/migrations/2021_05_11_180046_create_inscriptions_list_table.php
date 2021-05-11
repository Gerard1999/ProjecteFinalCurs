<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InscriptionsList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions_list', function (Blueprint $table) {
            $table->id();

            //Clau forana de Categories
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            
            //Clau forana de Runner
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('inscriptions_list');
    }
}
