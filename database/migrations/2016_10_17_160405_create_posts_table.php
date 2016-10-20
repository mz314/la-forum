<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',
            function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->timestamps();
            $table->integer('topic_id')->unsigned();
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->integer('user_id')->unsigned();

            $table
                ->foreign('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade');

            $table
                ->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

             $table
                ->foreign('parent_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}