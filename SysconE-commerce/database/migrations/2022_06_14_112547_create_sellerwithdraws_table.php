<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellerwithdraws', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('seller_name');
            $table->string('seller_b_method');
            $table->string('seller_charge');
            $table->string('seller_c_amount');
            $table->string('seller_t_ammount');
            $table->string('seller_w_ammount');
            $table->string('status');
            $table->dateTime('seller_date');
            $table->longText('seller_information');
            $table->softDeletes();
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
        Schema::dropIfExists('sellerwithdraws');
    }
};
