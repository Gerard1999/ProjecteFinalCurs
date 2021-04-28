<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
           //Clau forana de Organizers
           $table->bigInteger('organizer_id')->unsigned();
           $table->foreign('organizer_id')->references('id')->on('organizers');

           //Clau forana de Talles
           $table->bigInteger('size_id')->unsigned();
           $table->foreign('size_id')->references('id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
