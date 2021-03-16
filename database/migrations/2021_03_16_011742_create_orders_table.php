<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('shoppingcarts_id')->unsigned();
            $table->bigInteger('seller_id')->unsigned();
            $table->bigInteger('buyer_id')->unsigned();
            $table->integer('total');
            $table->timestamps();

            $table->foreign('shoppingcarts_id')
                    ->references('id')
                    ->on('shopping_carts')
                    ->onCascade('delete');

            $table->foreign('seller_id')
                    ->references('id')
                    ->on('users')
                    ->onCascade('delete');
            $table->foreign('buyer_id')
                    ->references('id')
                    ->on('users')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
