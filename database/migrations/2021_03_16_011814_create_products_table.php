<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();
            $table->string('description');
            $table->string('price');
            $table->string('size');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onCascade('delete');
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders')
                    ->onCascade('delete');

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
        Schema::dropIfExists('products');
    }
}
