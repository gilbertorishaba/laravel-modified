<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Student;
use App\Model\Course;

class Enrollment extends Model
{
    use HasFactory;

    // Define which attributes can be mass assigned
    protected $fillable = [
        'student_name',
        'email',
        'course_id',
        'enrollment_date',
        'status',
        'grade',
        'dob',
        'phone',        // Grade (nullable)
    ];

    // Define relationship with the Student model
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Define relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
