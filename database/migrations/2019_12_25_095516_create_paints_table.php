<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paints', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('def', 191);
			$table->string('alias', 191);
			$table->string('look', 191);
			$table->string('chassis', 191);
			$table->string('game', 191)->default('ets2');
			$table->integer('dlc_id')->nullable();
			$table->boolean('with_color')->default(0);
			$table->boolean('active')->nullable()->default(1);
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
		Schema::drop('paints');
	}

}
