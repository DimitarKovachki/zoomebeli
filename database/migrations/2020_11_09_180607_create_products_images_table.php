<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsImagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products_images', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('product_id')->unsigned();
      $table->string('image');
      $table->boolean('is_main');
      $table->timestamps();

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
    Schema::dropIfExists('products_images');
  }
}
