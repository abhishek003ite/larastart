<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusinessesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title', 535)->nullable();
            $table->text('logo')->nullable();
            $table->string('logoType', 255)->nullable();
            $table->text('banner')->nullable();
            $table->text('about')->nullable();
            $table->string('website', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 100)->nullable();
            $table->text('images')->nullable();
            $table->string('sellingTag', 255)->nullable();
            $table->text('currency')->nullable();
            $table->string('themeSelected', 255)->nullable();
            $table->timestamp('dOfJoining')->nullable()->useCurrent();
            $table->string('slogan', 255)->nullable();
            $table->text('services')->nullable();
            $table->string('selectedTheme', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('addressLine2', 255)->nullable();
            $table->string('town', 255)->nullable();
            $table->string('postcode', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('reportCount', 255)->nullable();
            $table->enum('status', ['active','suspend'])->nullable()->default('active');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('businesses', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('title');
            $table->dropColumn('logo');
            $table->dropColumn('logoType');
            $table->dropColumn('banner');
            $table->dropColumn('about');
            $table->dropColumn('website');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('images');
            $table->dropColumn('sellingTag');
            $table->dropColumn('currency');
            $table->dropColumn('themeSelected');
            $table->dropColumn('dOfJoining');
            $table->dropColumn('slogan');
            $table->dropColumn('services');
            $table->dropColumn('selectedTheme');
            $table->dropColumn('address');
            $table->dropColumn('addressLine2');
            $table->dropColumn('town');
            $table->dropColumn('postcode');
            $table->dropColumn('country');
            $table->dropColumn('reportCount');
            $table->dropColumn('status');
        });
    }
}
