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
            $table->string('name')->index();
            $table->integer('price');
            $table->string('description')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->unsignedInteger('unit_id');
            $table->unsignedInteger('shop_id');
            $table->unsignedInteger('product_categories_id');
            $table->boolean('is_active');

            $table->foreign('shop_id')
                  ->references('id')->on('shops')
                  ->onDelete('cascade'); 
             $table->foreign('product_categories_id')
                  ->references('id')->on('product_categories')
                  ->onDelete('cascade');       
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
