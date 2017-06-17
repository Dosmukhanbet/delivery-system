<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand_name')->nullable();
            $table->string('slug');
            $table->string('email')->nullable();
            $table->integer('min_order');
            $table->integer('rating')->default(0); 
            $table->integer('delivery_time');
            $table->text('description')->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->string('photo_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('city_id');

            // $table->unsignedInteger('shop_categories_id');
            // $table->foreign('shop_categories_id')
            //       ->references('id')->on('shop_categories');
                  
            $table->boolean('active')->default(0);
            $table->string('address');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('city_id')
                  ->references('id')->on('cities')
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
        Schema::dropIfExists('shops');
    }
}
