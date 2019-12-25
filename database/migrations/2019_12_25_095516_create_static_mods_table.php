<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaticModsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_mods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image', 191)->nullable();
			$table->string('title_en', 191);
			$table->string('title_ru', 191);
			$table->text('description_en', 65535)->nullable();
			$table->text('description_ru', 65535)->nullable();
			$table->string('file_name', 191)->nullable();
			$table->string('tested_ver', 191);
			$table->string('dlc', 191)->nullable();
			$table->text('external_link', 65535)->nullable();
			$table->boolean('active')->default(1);
			$table->integer('sort')->default(0);
			$table->string('game', 191)->default('ets2');
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
		Schema::drop('static_mods');
	}

}
