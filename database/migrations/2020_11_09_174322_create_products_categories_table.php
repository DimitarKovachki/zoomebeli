<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products_categories', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('category_id')->unsigned();
      $table->bigInteger('product_id')->unsigned();
      $table->timestamps();

      $table->foreign('category_id')->references('id')->on('categories');
      $table->foreign('product_id')->references('id')->on('products');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products_categories');
  }
}
