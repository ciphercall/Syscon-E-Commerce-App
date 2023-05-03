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
        Schema::create('homevisibilities', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('slider_status');
            $table->integer('slider_quantity');
            $table->string('brand_status');
            $table->integer('brand_quantity');
            $table->string('campaign_status');
            $table->integer('campaign_quantity');
            $table->string('p_category_status');
            $table->string('first_banner_status');
            $table->string('flash_status');
            $table->integer('flash_quantity');
            $table->string('product_status');
            $table->integer('product_quantity');
            $table->string('second_banner_status');
            $table->string('col_category_status');
            $table->integer('col_category_quantity');
            $table->string('third_banner_status');
            $table->string('service_status');
            $table->integer('service_quantity');
            $table->string('blog_status');
            $table->integer('blog_quantity');
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
        Schema::dropIfExists('homevisibilities');
    }
};
