<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'course_id', // Single course relationship
        'phone',
        'dob',
        'profile_image_url' // Ensure this is part of the fillable attributes
    ];

    // Enable automatic timestamps
    public $timestamps = true;

    // Accessor for profile image URL
    public function getProfileImageUrlAttribute()
    {
        return $this->profile_image_url ? asset('storage/' . $this->profile_image_url) : null;
    }

    // Define the relationship with the Course model
    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'course_id');
    // }

    //defining M-M because of pivot table enrollments
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments') // Specify the pivot table
                    ->withPivot('enrollment_date', 'status', 'grade'); // Add additional fields from the pivot table
    }
}

