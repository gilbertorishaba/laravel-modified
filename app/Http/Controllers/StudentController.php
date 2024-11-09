<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        // Load students with their associated courses
        $students = Student::with('courses')->get();
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::all(); // Fetch all courses to display in the dropdown
        return view('backend.students.create', compact('courses'));
    }

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
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
            'profile_image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('profile_image_url')) {
            $imagePath = $request->file('profile_image_url')->store('images/students', 'public');
        }

        // Create a new student
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'profile_image_url' => $imagePath,
        ]);

        // Attach the selected courses to the student
        $student->courses()->attach($request->courses);
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }


    public function show(Student $student)
    {
        return view('backend.students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('backend.students.edit', compact('student', 'courses'));
    }


    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'dob' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
        ]);

        // Update the student data
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ]);

        // Sync the selected courses with the student
        $student->courses()->sync($request->courses);
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->courses()->detach();
        if ($student->profile_image_url && Storage::disk('public')->exists($student->profile_image_url)) {
            Storage::disk('public')->delete($student->profile_image_url);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
