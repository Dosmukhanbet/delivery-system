<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('shop_id');
            $table->decimal('cost', 6, 2);
            

            $table->foreign('district_id')
                  ->references('id')->on('districts')
                  ->onDelete('cascade'); 

            $table->foreign('shop_id')
                  ->references('id')->on('shops')
                  ->onDelete('cascade'); 
            $table->unique(['district_id', 'shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
