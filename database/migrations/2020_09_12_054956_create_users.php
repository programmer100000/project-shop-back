<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrement('user_id');
            $table->string('fname' , 100)->nullable();
            $table->string('lname' , 100)->nullable();
            $table->string('username' , 100)->unique();
            $table->string('email' , 100)->unique()->nullable();
            $table->string('password' , 25)->nullable();
            $table->string('confirm_code' , 6);
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
        Schema::dropIfExists('users');
    }
}
