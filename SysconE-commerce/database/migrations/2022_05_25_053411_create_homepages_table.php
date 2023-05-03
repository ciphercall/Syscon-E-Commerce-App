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
        Schema::create('homepages', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('s_title');
            $table->string('product_qty');
            $table->string('category1');
            $table->string('sub_category1');
            $table->string('child_category1');
            $table->string('category2');
            $table->string('sub_category2');
            $table->string('child_category2');
            $table->string('category3');
            $table->string('sub_category3');
            $table->string('child_category3');
            $table->string('category4');
            $table->string('sub_category4');
            $table->string('child_category4');
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
        Schema::dropIfExists('homepages');
    }
};
