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
        Schema::create('widthdrawmethods', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('w_name');
            $table->string('w_min_amount');
            $table->string('w_max_amount');
            $table->string('widthdraw_charge');
            $table->longText('widthdraw_detail');
            $table->string('widthdraw_status');
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
        Schema::dropIfExists('widthdrawmethods');
    }
};
