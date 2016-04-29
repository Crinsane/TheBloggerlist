<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socialmedia', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->string('facebook')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('facebook_token')->nullable();
            $table->integer('facebook_followers')->unsigned()->nullable();
            $table->string('twitter')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('twitter_token')->nullable();
            $table->integer('twitter_followers')->unsigned()->nullable();
            $table->string('instagram')->nullable();
            $table->string('instagram_id')->nullable();
            $table->string('instagram_token')->nullable();
            $table->integer('instagram_followers')->unsigned()->nullable();
            $table->string('pinterest')->nullable();
            $table->string('pinterest_id')->nullable();
            $table->string('pinterest_token')->nullable();
            $table->integer('pinterest_followers')->unsigned()->nullable();
            $table->string('youtube')->nullable();
            $table->string('youtube_id')->nullable();
            $table->string('youtube_token')->nullable();
            $table->integer('youtube_followers')->unsigned()->nullable();
            $table->string('linkedin')->nullable();
            $table->string('linkedin_id')->nullable();
            $table->string('linkedin_token')->nullable();
            $table->integer('linkedin_followers')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('socialmedia');
    }
}
