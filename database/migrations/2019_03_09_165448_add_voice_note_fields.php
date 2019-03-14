<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVoiceNoteFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audio_notes', function($table) {
            $table->timestamp('date_of_event')->useCurrent();
            $table->longText('members')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('minister', 255)->nullable();
            $table->text('link')->nullable();
            $table->string('linkType', 255)->nullable();
            $table->tinyInteger('emailSent')->default(0);
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
        Schema::table('audio_notes', function($table) {
            $table->dropColumn('date_of_event');
            $table->dropColumn('members');
            $table->dropColumn('title');
            $table->dropColumn('minister');
            $table->dropColumn('link');
            $table->dropColumn('linkType');
            $table->dropColumn('emailSent');
            $table->dropColumn('enabled');
            $table->dropColumn('deleted');
        });
    }
}
