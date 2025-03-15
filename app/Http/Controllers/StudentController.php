<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::all();
        $students = Student::with('assignments')->get(); // Eager load assignments
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'StudentNumber' => 'required|string|unique:students,StudentNumber',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Email' => 'required|email|unique:students,Email',
        ]);

        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $student = Student::with('assignments.assignment')->find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $request->validate([
            'StudentNumber' => 'string|unique:students,StudentNumber,' . $id . ',StudentID',
            'FirstName' => 'string',
            'LastName' => 'string',
            'Email' => 'email|unique:students,Email,' . $id . ',StudentID',
        ]);

        $student->update($request->all());

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }

    
}
