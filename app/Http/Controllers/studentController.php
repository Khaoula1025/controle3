<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('index',  ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with(['courses' => function ($query) {
            $query->withPivot('date_exam', 'note_exam');
        }])->find($id);

        if (!$student) {
            return response()->json(['failed', 'no student found'], 404);
        }

        if ($student->courses->isEmpty()) {
            return view('students.no_courses', compact('student'));
        }

        return view('students.courses', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $course_id)
    {
        $student = Student::find($id);
        $courses = Course::all();
        $course = $student->courses()->where('course_id', $course_id)->first();
        if (!$student || !$course) {
            return response()->json(['error', 'cant edit ']);
        }
        return view('students.edit', compact('student', 'course', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        $course_id = $request->input('course_id');

        // Ensure the course exists for the student
        if (!$student->courses->contains($course_id)) {
            return response()->json(['error' => 'Course not found for this student'], 404);
        }

        $student->courses()->updateExistingPivot($course_id, [
            'note_exam' => $request->input('note_exam'),
            'date_exam' => $request->input('date_exam'),
        ]);

        return response()->json(['success' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $student = Student::find($id);
        $courseId = $request->get('course_id');
        $student->courses()->detach($courseId);
        return response()->json(['sucess', 'deleted sucessfully'], 200);
    }
    public function enroll(Request $request, $id)
    {
        $student = Student::find($id);
        $course_id = $request->input('course_id');

        $course = Course::find($course_id);

        if (!$student || !$course) {
            return response()->json(['error' => 'Student or course not found'], 404);
        }

        // Attach course to student
        $student->courses()->attach($course->id, [
            'note_exam' => $request->input('note_exam'),
            'date_exam' => $request->input('date_exam')
        ]);

        return response()->json(['success' => 'Added successfully'], 200);
    }
}
