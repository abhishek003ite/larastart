<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulletinFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulletins', function (Blueprint $table) {
            $table->string('title', 255)->nullable();
            $table->longText('members')->nullable();
            $table->timestamp('date')->nullable()->useCurrent();
            $table->text('image')->nullable();
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
        Schema::table('bulletins', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('members');
            $table->dropColumn('date');
            $table->dropColumn('image');
            $table->dropColumn('emailSent');
        });
    }
}
