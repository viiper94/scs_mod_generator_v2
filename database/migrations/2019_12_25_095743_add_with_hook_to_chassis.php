<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWithHookToChassis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chassis', function(Blueprint $table)
        {
            $table->boolean('with_hook')->default(0)->after('with_paint_job');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chassis', function (Blueprint $table) {
            $table->dropColumn('with_hook');
        });
    }
}
