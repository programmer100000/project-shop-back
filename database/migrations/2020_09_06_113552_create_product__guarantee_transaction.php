<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGuaranteeTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_guarantee_transactions', function (Blueprint $table) {
            
            $table->bigIncrements('product_guarantee_transaction_id');
            
            $table->double('price_guarantee', 10, 0);
            
            
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
        Schema::dropIfExists('product_guarantee_transactions');
    }
}
