<!-- <?php
// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateEnrollmentsTable extends Migration
// {
//     public function up()
//     {
//         Schema::create('enrollments', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('student_id')->constrained()->onDelete('cascade');
//             $table->foreignId('course_id')->constrained()->onDelete('cascade');
//             $table->timestamps();
//         });
//     }

//     public function down()
//     {
//         Schema::dropIfExists('enrollments');
//     }
// }


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id(); // Automatically adds an 'id' field as primary key
            $table->string('student_name'); // Student's name
            $table->string('email')->unique(); // Student's email
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key for course, assumes you have a 'courses' table
            $table->date('enrollment_date'); // Date when the student enrolls
            $table->enum('status', ['active', 'completed', 'inactive']); // Enrollment status
            $table->string('grade')->nullable(); // Grade of the student (optional)
            $table->date('dob'); // Date of birth
            $table->string('phone'); // Student's phone number
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}

