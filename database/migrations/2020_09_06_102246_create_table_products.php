<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->bigIncrements('product_id');
            
            $table->string('title', 50);
            
            $table->string('description', 200);
            
            $table->integer('balance')->unsigned();
            
            $table->double('offer', 10, 0)->nullable();
            
            $table->text('Review');
            $table->double('price' , 10 , 0);
            
            $table->boolean('special' , 0);
            
            $table->string('special_from' , 45)->nullable();
            $table->string('special_to' , 45)->nullable();
            
            $table->string('main_image', 200);
            $table->boolean('status')->default(false);
            
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
