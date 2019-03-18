<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtomChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amchats', function (Blueprint $table) {
            $table->timestamp('date')->useCurrent();
            $table->integer('from')->unsigned()->nullable();
            $table->integer('to')->unsigned()->nullable();
            $table->text('messages')->nullable();
            $table->integer('admin')->unsigned()->nullable();
            $table->enum('notification', ['read', 'unread'])->default('unread');
            $table->string('attachement', 255)->nullable();
            $table->enum('user1', ['true','false'])->nullable()->default('false');
            $table->enum('user2', ['true','false'])->nullable()->default('false');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amchats', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('messages');
            $table->dropColumn('admin');
            $table->dropColumn('notification');
            $table->dropColumn('attachement');
            $table->dropColumn('user1');
            $table->dropColumn('user2');
        });
    }
}
