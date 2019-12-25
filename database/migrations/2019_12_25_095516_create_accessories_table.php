<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accessories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('def', 191);
			$table->string('suffixes', 191)->nullable();
			$table->string('alias', 191);
			$table->string('chassis', 191);
			$table->string('game', 191)->default('ets2');
			$table->string('dlc', 7)->nullable();
			$table->boolean('active')->default(1);
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
		Schema::drop('accessories');
	}

}
