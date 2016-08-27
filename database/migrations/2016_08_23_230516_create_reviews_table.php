<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('rate')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('videopost_id')->unsigned();
            $table->integer('photopost_id')->unsigned();
            $table->integer('ebook_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('ebook_id')->references('id')->on('ebooks')->onDelete('cascade');
            $table->foreign('photopost_id')->references('id')->on('photo_posts')->onDelete('cascade');
            $table->foreign('videopost_id')->references('id')->on('video_posts')->onDelete('cascade');            
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
        Schema::drop('reviews');
    }
}
