<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBugReportFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bug_reports', function (Blueprint $table) {
            $table->integer('page_id')->unsigned()->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phoneNo', 100)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('reason')->nullable();
            $table->timestamp('deletedAt')->nullable()->useCurrent();
            $table->tinyInteger('enabled')->default(1);
            $table->tinyInteger('deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bug_reports', function (Blueprint $table) {
            $table->dropColumn('page_id');
            $table->dropColumn('name');
            $table->dropColumn('phoneNo');
            $table->dropColumn('email');
            $table->dropColumn('reason');
            $table->dropColumn('deletedAt');
            $table->dropColumn('enabled');
            $table->dropColumn('deleted');
        });
    }
}
