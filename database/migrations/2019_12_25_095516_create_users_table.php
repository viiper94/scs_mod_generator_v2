<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('email', 191)->nullable()->unique();
			$table->string('password', 191)->nullable();
			$table->string('image', 191)->nullable();
			$table->string('language', 191)->nullable();
			$table->string('theme', 191)->nullable();
			$table->string('social_logged_in', 191)->nullable();
			$table->string('owned_dlc', 191)->nullable();
			$table->boolean('admin')->default(0);
			$table->string('steamid64', 64)->nullable();
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
