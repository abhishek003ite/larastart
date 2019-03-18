<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBuddiesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buddies', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('friend_id')->unsigned()->nullable();
            $table->timestamp('date')->useCurrent();
            $table->tinyInteger('user_seen')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buddies', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('friend_id');
            $table->dropColumn('date');
            $table->dropColumn('user_seen');
        });
    }
}
