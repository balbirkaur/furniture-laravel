<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicelists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('serv_cate_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('servicepic');
            $table->enum('featured', array('Yes', 'No'))->default('No');
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
        Schema::dropIfExists('servicelists');
    }
}
