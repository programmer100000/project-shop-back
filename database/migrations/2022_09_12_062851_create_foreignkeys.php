<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('attributes', function (Blueprint $table) {
          $table->unsignedBigInteger('cat_id');

          $table->foreign('cat_id')->references('category_id')->on('categories');
      });
      Schema::table('product_categories', function (Blueprint $table) {
          $table->unsignedBigInteger('category_id');
          $table->unsignedBigInteger('product_id');

          $table->foreign('product_id')->references('product_id')->on('products');
          $table->foreign('category_id')->references('category_id')->on('categories');
      });
      Schema::table('product_tags', function (Blueprint $table) {
          $table->unsignedBigInteger('product_tag_id');
          $table->unsignedBigInteger('product_id');

          $table->foreign('product_id')->references('product_id')->on('products');

          $table->foreign('tag_id')->references('tag_id')->on('tags');
      });
      Schema::table('product_images', function (Blueprint $table) {
          $table->unsignedBigInteger('product_id');

          $table->foreign('product_id')->references('product_id')->on('products');
      });
      Schema::table('product_price_logs', function (Blueprint $table) {
          $table->unsignedBigInteger('product_id');

          $table->foreign('product_id')->references('product_id')->on('products');
      });
      Schema::table('Product_rates', function (Blueprint $table) {
          $table->unsignedBigInteger('product_id');
          $table->unsignedBigInteger('user_id');

          $table->foreign('user_id')->references('user_id')->on('users');
          $table->foreign('product_id')->references('product_id')->on('products');
      });
      Schema::table('product_guarantee_transactions', function (Blueprint $table) {
          $table->unsignedBigInteger('product_id');
          $table->unsignedBigInteger('guarantee_id');

          $table->foreign('guarantee_id')->references('guarantee_id')->on('guarantees');
          $table->foreign('product_id')->references('product_id')->on('products');
      });
      Schema::table('product_colors', function (Blueprint $table) {
          $table->unsignedBigInteger('product_id');
          $table->unsignedBigInteger('color_id');

          $table->foreign('color_id')->references('color_id')->on('colors');
          $table->foreign('product_id')->references('product_id')->on('products');
      });
      Schema::table('product_attrs', function (Blueprint $table) {
          $table->unsignedBigInteger('attribute_id');

          $table->foreign('attribute_id')->references('attribute_id')->on('attributes');
      });
      Schema::table('product_brands', function (Blueprint $table) {
          $table->unsignedBigInteger('product_id');

          $table->foreign('product_id')->references('product_id')->on('products');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
