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
        Schema::create('pendingsellerwithdraws', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('Pseller_name');
            $table->string('Pseller_b_method');
            $table->string('Pseller_charge');
            $table->string('Pseller_c_amount');
            $table->string('Pseller_t_ammount');
            $table->string('Pseller_w_ammount');
            $table->string('Pseller_status');
            $table->dateTime('Pseller_date');
            $table->longText('Pseller_information');
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
        Schema::dropIfExists('pendingsellerwithdraws');
    }
};
