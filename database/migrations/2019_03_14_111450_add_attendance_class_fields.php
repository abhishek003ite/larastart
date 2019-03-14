<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttendanceClassFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendance_classes', function (Blueprint $table) {
            $table->string('className', 255)->nullable();
            $table->text('ageGroup')->nullable();
            $table->longText('teacherName')->nullable();
            $table->text('teacherId')->nullable();
            $table->longText('studentName')->nullable();
            $table->text('studentId')->nullable();
            $table->tinyInteger('sendFirstSMS')->default(0);
            $table->tinyInteger('sendSecondSMS')->default(0);
            $table->tinyInteger('sendEmail')->default(0);
            $table->tinyInteger('enabled')->default(0);
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
        Schema::table('lives', function (Blueprint $table) {
            $table->dropColumn('className');
            $table->dropColumn('ageGroup');
            $table->dropColumn('teacherName');
            $table->dropColumn('teacherId');
            $table->dropColumn('studentName');
            $table->dropColumn('studentId');
            $table->dropColumn('sendFirstSMS');
            $table->dropColumn('sendSecondSMS');
            $table->dropColumn('sendEmail');
            $table->dropColumn('enabled');
            $table->dropColumn('deleted');
        });
    }
}
