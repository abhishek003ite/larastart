<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('title', 255)->nullable();
            $table->text('desc')->nullable();
            $table->text('image')->nullable();
            $table->float('price')->nullable();
            $table->enum('type', ['hard','soft'])->nullable()->default('soft');
            $table->string('file', 255)->nullable();
            $table->string('author', 255)->nullable();
            $table->integer('yop')->unsigned()->nullable()->default(2019);
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
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('desc');
            $table->dropColumn('image');
            $table->dropColumn('price');
            $table->dropColumn('type');
            $table->dropColumn('file');
            $table->dropColumn('author');
            $table->dropColumn('yop');
            $table->dropColumn('emailSent');
        });
    }
}
