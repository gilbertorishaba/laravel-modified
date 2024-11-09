<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Make sure to include this for current date/time

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_student')->insert([
            'course_id' => 1,       // The course ID
            'student_id' => 1,      // The student ID
            'enrollment_date' => Carbon::now(),
            'status' => 'enrolled', // Enrollment status
            'grade' => null         // Grade (can be null initially)
        ]);

        DB::table('course_student')->insert([
            'course_id' => 2,
            'student_id' => 2,
            'enrollment_date' => Carbon::now(),
            'status' => 'enrolled',
            'grade' => null
        ]);
    }
}
