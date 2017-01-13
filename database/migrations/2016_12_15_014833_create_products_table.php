<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('reference')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('collection')->nullable();
            $table->string('notes')->nullable();
            $table->string('image_file_path')->nullable();
            $table->string('image_file_name')->nullable()->after('image_file_path');;
            $table->integer('image_file_size')->nullable()->after('image_file_name');
            $table->string('image_content_type')->nullable()->after('image_file_size');
            $table->timestamp('image_updated_at')->nullable()->after('image_content_type');
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
        Schema::drop('products');
        //Schema::dropIfExists('products');
    }
}
