<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBannerImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banner_images', function (Blueprint $table) {
            $table->string('img', 255)->nullable();
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
        Schema::table('banner_images', function (Blueprint $table) {
            $table->dropColumn('img');
            $table->dropColumn('enabled');
            $table->dropColumn('deleted');
        });
    }
}
