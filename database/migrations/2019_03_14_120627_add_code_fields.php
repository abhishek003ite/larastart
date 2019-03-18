<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCodeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->string('code', 255)->nullable();
            $table->enum('status', ['used', 'unused'])->default('unused');
            $table->string('by', 100)->nullable()->default('no one');
            $table->timestamp('used')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('status');
            $table->dropColumn('by');
            $table->dropColumn('used');
        });
    }
}
