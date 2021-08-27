<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('proj_cate_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('client');
            $table->string('acreage');
            $table->string('project_date');
            $table->string('projectpic');
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
        Schema::dropIfExists('projectlists');
    }
}
