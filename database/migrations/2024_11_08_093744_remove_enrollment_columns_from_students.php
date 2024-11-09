<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEnrollmentColumnsFromStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['enrollment_date', 'status', 'grade']);
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->date('enrollment_date')->nullable();
            $table->string('status')->nullable();
            $table->string('grade')->nullable();
        });
    }



}
