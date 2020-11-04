<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWheelTypeToChassisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chassis', function (Blueprint $table) {
            $table->string('wheel_type')->default('r')->after('wheels_id');
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
            $table->dropColumn('wheel_type');
        });
    }
}
