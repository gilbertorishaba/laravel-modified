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
            $enrollmentDate = $student->enrollment_date ?? now();

            // Insert into enrollments table
            DB::table('enrollments')->insert([
                'student_id' => $student->id,
                'course_id' => $student->course_id,
                'enrollment_date' => $enrollmentDate,
                'status' => $student->status ?? 'Pending',
                'grade' => $student->grade ?? 'N/A',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        //remove all records from enrollments
        DB::table('enrollments')->truncate();
    }
}
