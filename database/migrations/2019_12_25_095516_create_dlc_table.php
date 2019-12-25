<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDlcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dlc', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('short_name', 191);
			$table->string('game', 191)->default('ets2');
			$table->boolean('mp_support')->default(1);
			$table->string('type', 191)->nullable()->default('other');
			$table->boolean('active')->default(1);
			$table->integer('sort')->default(0);
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
		Schema::drop('dlc');
	}

}
