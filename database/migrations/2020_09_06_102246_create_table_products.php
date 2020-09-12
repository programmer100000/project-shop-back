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
            
            $table->double('offer', 10, 0);
            
            $table->text('Review');
            
            $table->boolean('special')->default(false);
            
            $table->dateTime('special-from')->default(new DateTime());
            $table->dateTime('special-to')->default(new DateTime());
            
            $table->string('main-image', 200);
            
            $table->timestamps();
                        
            
            
            
            
            
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
