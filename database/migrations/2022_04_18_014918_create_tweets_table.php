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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();

            $table->string('body', 255)->comment('ツイート');
            $table->string('img_path', 255)->nullable()->comment('ツイート');
            $table->unsignedBigInteger('user_id')->comment('投稿者');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('親になるツイート');
            $table->unsignedBigInteger('retweet_id')->nullable()->comment('リツイートID');
            $table->unsignedInteger('fav_count')->nullable()->comment('お気に入りカウント');
            $table->unsignedInteger('rt_count')->nullable()->comment('リツイートカウント');
            $table->unsignedInteger('rep_count')->nullable()->comment('リプライカウント');

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
        Schema::dropIfExists('tweets');
    }
};
