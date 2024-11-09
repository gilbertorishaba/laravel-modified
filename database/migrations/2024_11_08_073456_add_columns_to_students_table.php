<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToStudentsTable extends Migration
{
    // The 'up' method is used to add new columns
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->date('enrollment_date')->nullable();  // Add 'enrollment_date' column
            $table->string('status')->nullable();         // Add 'status' column
            $table->string('grade')->nullable();          // Add 'grade' column
        });
    }

    // The 'down' method is used to rollback the changes made in 'up' method
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['enrollment_date', 'status', 'grade']);
        });
    }
}
