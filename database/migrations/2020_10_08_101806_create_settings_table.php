<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
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
            $table->string('header_email_id', '30');
            $table->string('header_toll_free', '20');
            $table->string('facebook_link', '100');
            $table->string('instagram_link', '100');
            $table->string('dribble_link', '100');
            $table->string('google_link', '100');
            $table->string('twitter_link', '100');
            $table->string('footer_address', '100');
            $table->string('footer_phone', '20');
            $table->string('footer_email', '25');
            $table->string('footer_opening_hours', '50');
            $table->text('footer_text');
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
}
