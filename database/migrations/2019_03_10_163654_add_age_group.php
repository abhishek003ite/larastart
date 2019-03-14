<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgeGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('age_groups', function (Blueprint $table) {
            $table->string('ageGroup', 255)->nullable();
            $table->string('name', 255)->nullable();
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
        Schema::table('age_groups', function (Blueprint $table) {
            $table->dropColumn('ageGroup');
            $table->dropColumn('name');
            $table->dropColumn('enabled');
            $table->dropColumn('deleted');
        });
    }
}
