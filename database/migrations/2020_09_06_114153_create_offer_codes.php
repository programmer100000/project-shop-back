<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferCodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_codes', function (Blueprint $table) {

            $table->bigIncrements('offer_code_id');
            
            $table->string('offer_code', 6);
            
            $table->integer('limit')->default(-1);
            
            $table->dateTime('fromdate');
            
            $table->dateTime('todate');
            
                        
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
        Schema::dropIfExists('offer_codes');
    }
}
