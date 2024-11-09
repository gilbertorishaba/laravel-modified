<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Student;
use Auth;

class ReportController extends Controller
{
    public function index() {
        // Fetch student details like name, course, and any other relevant fields
        $students = Student::select('name', 'course_id', 'created_at')->with('course')->get();

        // Fetch the number of students enrolled in each course
        $courses = Course::pluck('course_name');  // Get all course names
        $enrollments = Course::withCount('students')->pluck('students_count');  // Count students per course

        // Pass the data to the view
        return view('backend.reports.index', compact('students', 'courses', 'enrollments'));
    }



    public function create()
    {
        //fetch all courses
        $courses = Course::with(['students' => function ($query) {
            // specific fields from stu table
            $query->select('students.id', 'students.name', 'students.email', 'students.profile_image_url')
                  ->join('course_student as cs1', 'students.id', '=', 'cs1.student_id')
                  ->join('course_student as cs2', 'students.id', '=', 'cs2.student_id')
                  // Filter students who are enrolled in course IDs 1, 2, 3, or 4
                  ->whereIn('cs1.course_id', [1, 2, 3, 4])
                  ->orWhereIn('cs2.course_id', [1, 2, 3, 4]);
        }])->get();


        return view('backend.reports.create', compact('courses'));
    }





    public function store(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'report_type' => 'required|string|max:255',
            'generated_at' => 'required|date',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Automatically set generated_by to the authenticated admin
        $validatedData['generated_by'] = Auth::user()->name;

        // Store the validated data in the database
        Report::create([
            'report_type' => $validatedData['report_type'],
            'generated_at' => $validatedData['generated_at'],
            'generated_by' => $validatedData['generated_by'],
            'course_id' => $validatedData['course_id'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Report generated successfully.');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('backend.reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'report_type' => 'required|string|max:255',
        ]);

        $report = Report::findOrFail($id);
        $report->update([
            'report_type' => $request->input('report_type'),
        ]);

        return redirect()->route('backend.reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('backend.reports.index')->with('success', 'Report deleted successfully.');
    }
}
