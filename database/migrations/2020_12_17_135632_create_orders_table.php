<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('client_name');
            $table->string('city');
            $table->string('personal_address')->nullable();
            $table->string('phone');
            $table->string('office_address')->nullable();
            $table->boolean('to_office');
            $table->string('ip');
            $table->text('note')->nullable();
            $table->float('shipping_cost');
            $table->float('total');

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
        Schema::dropIfExists('orders');
    }
}
