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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('megamenu_img');
            $table->string('megamenu_title');
            $table->string('megamenu_description');
            $table->string('megamenu_buttonlink');
            $table->string('megamenu_buttontext');
            $table->string('megamenu_status');
            $table->string('homepage_img');
            $table->string('homepage_title');
            $table->string('homepage_description');
            $table->string('homepage_buttonlink');
            $table->string('homepage_first_imgone');
            $table->string('homepage_first_titleone');
            $table->string('homepage_first_descriptionone');
            $table->string('homepage_first_buttonlinkone');
            $table->string('homepage_first_imgtwo');
            $table->string('homepage_first_titletwo');
            $table->string('homepage_first_descriptiontwo');
            $table->string('homepage_first_buttonlinktwo');
            $table->string('homepage_second_imgone');
            $table->string('homepage_second_titleone');
            $table->string('homepage_second_descriptionone');
            $table->string('homepage_second_buttonlinkone');
            $table->string('homepage_second_imgtwo');
            $table->string('homepage_second_titletwo');
            $table->string('homepage_second_descriptiontwo');
            $table->string('homepage_second_buttonlinktwo');
            $table->string('homepage_third_imgone');
            $table->string('homepage_third_titleone');
            $table->string('homepage_third_descriptionone');
            $table->string('homepage_third_buttonlinkone');
            $table->string('homepage_third_imgtwo');
            $table->string('homepage_third_titletwo');
            $table->string('homepage_third_descriptiontwo');
            $table->string('homepage_third_buttonlinktwo');
            $table->string('shoppage_img');
            $table->string('shoppage_headerone');
            $table->string('shoppage_headertwo');
            $table->string('shoppage_titleone');
            $table->string('shoppage_titletwo');
            $table->string('shoppage_status');
            $table->string('shoppage_link');
            $table->string('shoppage_buttontext');
            $table->string('product_status');
            $table->string('product_img');
            $table->string('product_title');
            $table->string('product_description');
            $table->string('product_buttonlink');
            $table->string('shopping_status');
            $table->string('shopping_imgone');
            $table->string('shopping_titleone');
            $table->string('shopping_descriptionone');
            $table->string('shopping_buttonlinkone');
            $table->string('shopping_imgtwo');
            $table->string('shopping_titletwo');
            $table->string('shopping_descriptiontwo');
            $table->string('shopping_buttonlinktwo');
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
        Schema::dropIfExists('advertisements');
    }
};
