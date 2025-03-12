<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    // Define os campos que podem ser preenchidos
    protected $fillable = ['name', 'teacher_id'];

    // Define o relacionamento com a tabela 'teachers'
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }
}
