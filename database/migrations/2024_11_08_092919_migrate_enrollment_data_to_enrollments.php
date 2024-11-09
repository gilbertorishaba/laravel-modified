<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class MigrateEnrollmentDataToEnrollments extends Migration
{
    public function up()
    {
        // Fetch students with their course_id and enrollment data
        $students = DB::table('students')->get(['id', 'course_id', 'enrollment_date', 'status', 'grade']);

        foreach ($students as $student) {
            // Check if enrollment_date is null or not set
            $enrollmentDate = $student->enrollment_date ?? now(); // Use current date if null

            // Insert into enrollments table
            DB::table('enrollments')->insert([
                'student_id' => $student->id,
                'course_id' => $student->course_id,
                'enrollment_date' => $enrollmentDate,  // Ensure this is never null
                'status' => $student->status ?? 'Pending',  // Default status if not set
                'grade' => $student->grade ?? 'N/A',  // Default grade if not set
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        // Rollback logic: remove all records from enrollments
        DB::table('enrollments')->truncate();
    }
}
