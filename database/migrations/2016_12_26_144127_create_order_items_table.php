<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('variant_id')->index()->nullable();
            $table->foreign('variant_id')->references('id')->on('variants')
                ->onDelete('SET NULL')
                ->onUpdate('cascade');
            $table->string('reference');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
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
        Schema::dropIfExists('order_items');
    }
}
