<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Enrollment;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
         'description',
        'credit_hours',
    ];

// One-to-Many relationship with students
public function students()
{
    return $this->belongsToMany(Student::class)->withPivot('enrollment_date', 'status', 'grade');
}

// one-to-many relationship with Enrollment
public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}



}

