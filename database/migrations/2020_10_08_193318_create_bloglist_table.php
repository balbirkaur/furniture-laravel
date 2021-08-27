<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloglistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloglist', function (Blueprint $table) {
            $table->id();
            $table->string('blog_cate_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->text('excerpt');
            $table->tinyInteger('status')->default(0);
            $table->string('blogpic');
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
        Schema::dropIfExists('bloglist');
    }
}
