<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // Display the list of students
    public function index()
    {
        // Load students with their associated course
        $students = Student::with('course')->get();
        return view('backend.students.index', compact('students'));
    }

    // Show the form for creating a new student
    public function create()
    {
        $courses = Course::all(); // Fetch all courses to display in the dropdown
        return view('backend.students.create', compact('courses'));
    }

    // Store a new student
    public function store(Request $request)
    {
        // Log incoming request data for debugging
        \Log::info($request->all());

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'profile_image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle profile image upload
        $imagePath = null;
        if ($request->hasFile('profile_image_url')) {
            $imagePath = $request->file('profile_image_url')->store('images/students', 'public');
        }

        // Create a new student with the validated data
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'course_id' => $request->course_id,
            'profile_image_url' => $imagePath,
        ]);

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    // Display a specific student
    public function show(Student $student)
    {
        // Load the associated course for the student
        return view('backend.students.show', compact('student'));
    }

    // Show the form for editing a student
    public function edit($id)
    {
        $student = Student::findOrFail($id);  // Fetch the student by ID
        return view('backend.students.edit', compact('student'));
    }




    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email,' . $id, // Unique email validation except for the current student
            'course_enrolled' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
        ]);

        // Update the student data
        $student->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'course_enrolled' => $request->input('course_enrolled'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect back or to another page with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }


    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        // If the student has an image, delete it from storage (optional)
        if ($student->image && file_exists(public_path('images/students/' . $student->image))) {
            unlink(public_path('images/students/' . $student->image));
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

}
