<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserAccountIdAndUserIdToAttributeHeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attribute_heads', function (Blueprint $table) {
            $table->string('user_account_id')->after('name');
            $table->string('user_id')->after('user_account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribute_heads', function (Blueprint $table) {
            //
        });
    }
}
