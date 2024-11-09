<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    // Method to show the enrollment form
    public function showEnrollmentForm(Request $request)
    {
        // Check if the authenticated user is an admin
        if (Auth::user()->is_admin !== 1) {
            return redirect()->route('welcome')->with('error', 'Unauthorized access');
        }

        // Fetch the course based on the course ID passed in the request (e.g., ?course=1)
        $courseId = $request->query('course');
        $course = Course::findOrFail($courseId);

        // Fetch all students to display in the enrollment form
        $students = Student::all();

        // Pass the course and students to the view
        return view('admin.enroll', compact('course', 'students'));
    }

  // Assuming you are using the Enrollment model
public function store(Request $request)
{
    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'course_id' => 'required|exists:courses,id',
        'enrollment_date' => 'required|date',
        'status' => 'required|in:active,completed,inactive',
        'grade' => 'nullable|string',
        'dob' => 'required|date',
        'phone' => 'required|string',
    ]);

    // Create a new enrollment
    $enrollment = Enrollment::create([
        'student_name' => $request->name,
        'email' => $request->email,
        'course_id' => $request->course_id,
        'enrollment_date' => $request->enrollment_date,
        'status' => $request->status,
        'grade' => $request->grade,
        'dob' => $request->dob,
        'phone' => $request->phone,
    ]);

    // You can return a success message or redirect
    return redirect()->route('admin.enroll')->with('success', 'Enrollment created successfully!');
}


 // In your Controller
//  public function show($course_id)
//  {


//      // Get the course with enrolled students, including the pivot data
//      $course = Course::with('students')->find($course_id);

//      if (!$course) {
//          return redirect()->route('admin.enroll')->with('error', 'Course not found');
//      }

//      // Pass the course data to the view
//      return view('admin.show', compact('course'));
//  }

public function show($courseId)
{
    // Eager load the students with their pivot data (enrollment_date, status, grade)
    $course = Course::with('students')->find($courseId);

    // Check if the course was found
    if (!$course) {
        return redirect()->back()->with('error', 'Course not found.');
    }

    return view('admin.show', compact('course'));
}
}









