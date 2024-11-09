<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
         'description',
        'credit_hours',
    ];

// One-to-Many relationship with students (Each course has many students)
public function students()
{
    return $this->belongsToMany(Student::class)
                ->withPivot('enrollment_date', 'status', 'grade');
}


}

