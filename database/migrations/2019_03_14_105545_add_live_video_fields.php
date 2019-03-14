<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLiveVideoFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lives', function (Blueprint $table) {
            $table->timestamp('date')->useCurrent();
            $table->timestamp('dateOfEvent')->useCurrent();
            $table->text('members')->nullable();
            $table->string('title')->nullable();
            $table->string('minister')->nullable();
            $table->string('link', 255)->nullable();
            $table->string('linkType', 255)->nullable();
            $table->timestamp('schedule')->useCurrent();
            $table->enum('status', ['off', 'on'])->nullable()->default('on');;
            $table->float('expiryHours')->nullable();
            $table->float('expiryMinutes')->nullable();
            $table->tinyInteger('emailSent')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lives', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('dateOfEvent');
            $table->dropColumn('members');
            $table->dropColumn('title');
            $table->dropColumn('minister');
            $table->dropColumn('link');
            $table->dropColumn('linkType');
            $table->dropColumn('schedule');
            $table->dropColumn('status');
            $table->dropColumn('expiryHours');
            $table->dropColumn('expiryMinutes');
            $table->dropColumn('emailSent');
        });
    }
}
