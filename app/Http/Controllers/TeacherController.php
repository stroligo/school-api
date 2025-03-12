<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Teacher::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        $teacher = Teacher::create($validated);

        return response()->json($teacher, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return response()->json($teacher, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        $teacher->update($validated);

        return response()->json($teacher, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted successfully'], 200);
    }
}
