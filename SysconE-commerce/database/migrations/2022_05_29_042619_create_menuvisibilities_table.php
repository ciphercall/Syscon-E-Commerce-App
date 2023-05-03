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
        Schema::create('menuvisibilities', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('menu_name');
            $table->string('slug');
            $table->integer('serial_no');
            $table->string('visibility_status');
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
        Schema::dropIfExists('menuvisibilities');
    }
};
