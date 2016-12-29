<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBagItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bag_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bag_id')->index();
            $table->integer('variant_id')->index();
            $table->foreign('variant_id')->references('id')->on('variants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('quantity');
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
        Schema::dropIfExists('bag_items');
    }
}
