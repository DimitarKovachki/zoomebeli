<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAttributes extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products_attributes', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('product_id')->unsigned();
      $table->bigInteger('attribute_id')->unsigned();
      $table->timestamps();

      $table->foreign('product_id')->references('id')->on('products');
      $table->foreign('attribute_id')->references('id')->on('attributes');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products_attributes');
  }
}
