<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variant_id')->index();
            $table->foreign('variant_id')->references('id')->on('variants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('option_id')->index();
            $table->foreign('option_id')->references('id')->on('options')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->integer('option_value_id')->index();
            $table->foreign('option_value_id')->references('id')->on('option_values')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->unique(['variant_id', 'option_id', 'option_value_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variant_value');
    }
}
