<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todos os cursos com o código HTTP 200
        return response()->json(Course::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar os dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id', // Garante que o teacher_id existe na tabela de teachers
        ]);

        // Criar o novo curso
        $course = Course::create($validated);

        // Retorna o curso criado com o código HTTP 201
        return response()->json($course, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // Carrega o relacionamento com o Teacher e retorna o curso com os dados do professor
        return response()->json($course->load('teacher'), 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Validar os dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id', // Garante que o teacher_id existe na tabela de teachers
        ]);

        // Atualizar o curso com os dados validados
        $course->update($validated);

        // Retorna o curso atualizado com o código HTTP 200
        return response()->json($course, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Deletar o curso
        $course->delete();

        // Retorna uma mensagem de sucesso com o código HTTP 204 (sem conteúdo)
        return response()->json(['message' => 'Course deleted successfully'], 204);
    }
}
