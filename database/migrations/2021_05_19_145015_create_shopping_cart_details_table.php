<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->default(1);
            $table->decimal('price');
            $table->string('size')->nullable();

            //Clau forana de Carro de la Compra
            $table->unsignedBigInteger('shopping_cart_id')->nullable();
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('cascade');

            //Clau forana de Producte
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('shopping_cart_details');
    }
}
