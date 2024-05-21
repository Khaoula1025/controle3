<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getCourses()
    {

        return $courses = Course::all(); // Fetch all courses from the database

    }
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with('students')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function students($id)
    {
        $course = Course::with('students')->findOrFail($id);
        $students = $course->students()->withPivot('note', 'date_exam')->get();
        return view('courses.students', compact('course', 'students'));
    }
}
