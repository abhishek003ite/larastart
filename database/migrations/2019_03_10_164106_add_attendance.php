<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->timestamp('date')->useCurrent();
            $table->integer('number')->unsigned()->nullable();
            $table->integer('youthNumber')->unsigned()->nullable();
            $table->integer('childrenNumber')->unsigned()->nullable();
            $table->integer('adminUser')->unsigned()->nullable();
            $table->timestamp('post')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('number');
            $table->dropColumn('youthNumber');
            $table->dropColumn('childrenNumber');
            $table->dropColumn('adminUser');
            $table->dropColumn('post');
        });
    }
}
