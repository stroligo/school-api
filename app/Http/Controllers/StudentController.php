<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Retorna a lista de estudantes.
     */
    public function index()
    {
        return response()->json(Student::all(), 200);
    }

    /**
     * Armazena um novo estudante.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'grade' => 'required|string|max:10',
        ]);

        $student = Student::create($validated);

        return response()->json($student, 201);
    }

    /**
     * Exibe um estudante específico.
     */
    public function show(Student $student)
    {
        // Carregar os cursos relacionados ao estudante
        $student->load('courses');

        // Preparar os dados no formato desejado
        $response = [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'birthdate' => $student->birthdate,
                'grade' => $student->grade,
            ],
            'courses' => $student->courses->map(function ($course) {
                return [
                    'course_id' => $course->id,
                    'course_name' => $course->name,
                ];
            })
        ];

        return response()->json($response, 200);
    }

    /**
     * Atualiza um estudante.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'grade' => 'required|string|max:10',
        ]);

        $student->update($validated);

        return response()->json($student, 200);
    }

    /**
     * Remove um estudante.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
