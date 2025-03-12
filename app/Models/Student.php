<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthdate',
        'grade',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }

    // Relacionamento com Enrollment (matrículas)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }
}
