<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    // Definir os campos que podem ser preenchidos (Mass Assignment)
    protected $fillable = ['student_id', 'course_id'];

    /**
     * Definir a relação de matrícula com o aluno.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Definir a relação de matrícula com o curso.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
