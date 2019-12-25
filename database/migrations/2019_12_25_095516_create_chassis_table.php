<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChassisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chassis', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('parent_trailer')->nullable();
			$table->string('chain_type_size', 10)->nullable();
			$table->text('trailers', 65535);
			$table->string('alias', 191);
			$table->string('alias_short', 191);
			$table->string('accessory_subgroup', 191)->nullable();
			$table->string('alias_short_paint', 191);
			$table->integer('wheels_id');
			$table->boolean('supports_wheels')->default(1);
			$table->boolean('coupled')->default(0);
			$table->boolean('with_accessory')->default(0);
			$table->boolean('with_paint_job')->default(0);
			$table->string('default_paint_job', 191)->nullable();
			$table->boolean('can_empty')->default(1);
			$table->boolean('can_all_companies')->default(1);
			$table->boolean('can_random')->default(0);
			$table->string('game', 191)->default('ets2');
			$table->boolean('mp_support')->default(1);
			$table->integer('dlc_id')->nullable();
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
		Schema::drop('chassis');
	}

}
