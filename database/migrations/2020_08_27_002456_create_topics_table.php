<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration 
{
	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->biginteger('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned();
            $table->integer('reply_count')->default(0)->unsigned();
            $table->integer('view_count')->default(0)->unsigned();
            $table->biginteger('last_reply_user_id')->default(0)->unsigned();
            $table->integer('order')->default(0);
            $table->text('excerpt')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('topics');
	}
}
