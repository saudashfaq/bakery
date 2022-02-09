<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_outlets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('outlet_id');
            $table->string('product_quantity');
            $table->string('status');
            $table->unsignedBigInteger('assigned_by_user_id');
            $table->unsignedBigInteger('received_by_user_id')->nullable();
            $table->unsignedBigInteger('rejected_by_user_id')->nullable();
            $table->dateTime('received_date')->nullable();
            $table->dateTime('rejected_date')->nullable();
            $table->string('selling_price');
            $table->string('total_amount')->nullable();
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
        Schema::dropIfExists('product_outlets');
    }
}
