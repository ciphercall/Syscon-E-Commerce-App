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
        Schema::create('seosetups', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('home_s_title');
            $table->longText('home_s_description');
            $table->string('about_s_title');
            $table->longText('about_s_description');
            $table->string('contact_s_title');
            $table->longText('contact_s_description');
            $table->string('brand_s_title');
            $table->longText('brand_s_description');
            $table->string('seller_s_title');
            $table->longText('seller_s_description');
            $table->string('blog_s_title');
            $table->longText('blog_s_description');
            $table->string('campaign_s_title');
            $table->longText('campaign_s_description');
            $table->string('flash_s_title');
            $table->longText('flash_s_description');
            $table->string('shop_s_title');
            $table->longText('shop_s_description');
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
        Schema::dropIfExists('seosetups');
    }
};
