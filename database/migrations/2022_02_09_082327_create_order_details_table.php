<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
        $table->increments('id');
        $table->string('order_id');
        $table->string('product_id');
        $table->string('product_quantity');
        $table->string('status');
        $table->string('approved_by')->nullable();
        $table->dateTime('approved_date')->nullable();
        $table->dateTime('received_date')->nullable();
        $table->dateTime('rejected_date')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
