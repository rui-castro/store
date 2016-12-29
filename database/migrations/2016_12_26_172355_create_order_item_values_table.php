<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_item_id')->index();
            $table->foreign('order_item_id')->references('id')->on('order_items')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('value');
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
        Schema::dropIfExists('order_item_values');
    }
}
