<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtoaChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aachats', function (Blueprint $table) {
            $table->timestamp('date')->useCurrent();
            $table->integer('from')->unsigned()->nullable();
            $table->integer('to')->unsigned()->nullable();
            $table->text('message')->nullable();
            $table->enum('notification', ['read', 'unread'])->default('unread');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aachats', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('message');
            $table->dropColumn('notification');
        });
    }
}
