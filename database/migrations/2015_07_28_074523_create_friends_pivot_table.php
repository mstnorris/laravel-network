<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function(Blueprint $table) {
            $table->integer('follower_id')->unsigned()->index();
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('followed_id')->unsigned()->index();
            $table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('friends');
    }
}
