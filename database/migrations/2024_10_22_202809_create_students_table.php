<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            //defining FK
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Explicit foreign key definition
            $table->string('profile_image_url')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('dob');
            $table->timestamps();

            //to achieve perfomance optim.
            $table->index('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
