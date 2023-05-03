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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_logo');
            $table->string('site_fabicon');
            $table->string('phone');
            $table->string('email');
            $table->string('currency');
            $table->string('timezone');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->longText('meta_description');
            $table->longText('live_chat_script');
            $table->string('theme_color_one');
            $table->string('theme_color_two');
            $table->string('chat_link');
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
        Schema::dropIfExists('settings');
    }
};
