<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
           $table->integer('post_id')->unsigned()->nullable()->default(null);
           $table->integer('photopost_id')->unsigned()->nullable()->default(null);
           $table->integer('videopost_id')->unsigned()->nullable()->default(null);
           $table->integer('ebook_id')->unsigned()->nullable()->default(null);

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('photopost_id')->references('id')->on('photo_posts');
            $table->foreign('videopost_id')->references('id')->on('video_posts');
            $table->foreign('ebook_id')->references('id')->on('ebooks');
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
        Schema::drop('images');
    }
}