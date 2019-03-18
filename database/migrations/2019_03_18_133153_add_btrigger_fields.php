<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBtriggerFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('btrigers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('year')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('btrigers', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('year');
        });
    }
}
