<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adverts', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('week')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->string('horizontal', 535)->nullable();
            $table->string('vertical', 535)->nullable();
            $table->enum('status', ['paid', 'unpaid'])->nullable()->default('unpaid');
            $table->timestamp('starting')->useCurrent();
            $table->tinyInteger('approval')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adverts', function($table){
            $table->dropColumn('user_id');
            $table->dropColumn('week');
            $table->dropColumn('date');
            $table->dropColumn('horizontal');
            $table->dropColumn('vertical');
            $table->dropColumn('status');
            $table->dropColumn('starting');
            $table->dropColumn('approval');
        });
    }
}
