_<?php

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
            $table->integer('photo_post_id')->unsigned()->nullable()->default(null);
            $table->integer('video_post_id')->unsigned()->nullable()->default(null);
            $table->integer('ebook_id')->unsigned()->nullable()->default(null);

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('photo_post_id')->references('id')->on('photoposts')->onDelete('cascade');
            $table->foreign('video_post_id')->references('id')->on('videoposts')->onDelete('cascade');
            $table->foreign('ebook_id')->references('id')->on('ebooks')->onDelete('cascade');
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
