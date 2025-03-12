<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of all enrollments.
     */
    public function index()
    {
        return response()->json(Enrollment::with(['student', 'course'])->get(), 200);
    }

    /**
     * Store a newly created enrollment in the database.
     */
    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Criar a matrícula
        $enrollment = Enrollment::create($validated);

        return response()->json($enrollment, 201);
    }

    /**
     * Display the specified enrollment.
     */
    public function show($id)
    {
        // Buscar a matrícula com o id informado
        $enrollment = Enrollment::find($id);

        // Verificar se a matrícula foi encontrada
        if (!$enrollment) {
            return response()->json(['error' => 'Enrollment not found'], 404);
        }

        // Recuperar os dados do aluno e do curso
        $student = $enrollment->student;
        $course = $enrollment->course;

        // Preparar os dados no formato solicitado
        $response = [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'birthdate' => $student->birthdate,
                'grade' => $student->grade,
            ],
            'enrollments' => [
                [
                    'course_id' => $course->id,
                    'course_name' => $course->name,
                ]
            ]
        ];

        // Retornar a resposta no formato correto
        return response()->json($response, 200);
    }


    /**
     * Update the specified enrollment.
     */
    public function update(Request $request, $id)
    {
        $enrollment = Enrollment::find($id);

        if (!$enrollment) {
            return response()->json(['error' => 'Enrollment not found'], 404);
        }

        // Validação dos dados de entrada
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Atualizar matrícula
        $enrollment->update($validated);

        return response()->json($enrollment, 200);
    }

    /**
     * Remove the specified enrollment from storage.
     */
    public function destroy($id)
    {
        $enrollment = Enrollment::find($id);

        if (!$enrollment) {
            return response()->json(['error' => 'Enrollment not found'], 404);
        }

        // Excluir matrícula
        $enrollment->delete();

        return response()->json(['message' => 'Enrollment deleted successfully'], 204);
    }

    public function getEnrollmentsByStudent($student_id)
    {
        // Buscar o estudante pelo ID
        $student = Student::find($student_id);

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Carregar os cursos relacionados a esse aluno através das matrículas
        $enrollments = $student->enrollments()->with('course')->get();

        // Preparar a resposta
        $response = [
            'student' => [
                'id' => $student->id,
                'name' => $student->name,
                'birthdate' => $student->birthdate,
                'grade' => $student->grade,
            ],
            'enrollments' => $enrollments->map(function ($enrollment) {
                return [
                    'course_id' => $enrollment->course->id,
                    'course_name' => $enrollment->course->name,
                ];
            })
        ];

        return response()->json($response, 200);
    }

    public function unenroll($student_id, $course_id)
    {
        // Verificar se o aluno existe
        $student = Student::find($student_id);
        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Verificar se o curso existe
        $course = Course::find($course_id);
        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        // Verificar se a matrícula existe
        $enrollment = Enrollment::where('student_id', $student_id)
            ->where('course_id', $course_id)
            ->first();

        if (!$enrollment) {
            return response()->json(['error' => 'Enrollment not found'], 404);
        }

        // Remover a matrícula
        $enrollment->delete();

        return response()->json(['message' => 'Student unenrolled successfully'], 200);
    }
}
