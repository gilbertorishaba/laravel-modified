<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Enrollment;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'dob',
        'profile_image_url'
    ];

    // Enable automatic timestamps
    public $timestamps = true;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withPivot('enrollment_date', 'status', 'grade');
    }


    public function course()
    {
        return $this->belongsTo(Course::class); // Ensures a student belongs to a course
    }


    /**
     * Define the one-to-many relationship with enrollments.
     * Each student can have many enrollments.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
