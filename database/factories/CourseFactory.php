<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    // Definindo qual modelo a Factory deve gerar
    protected $model = Course::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' ' . $this->faker->randomElement(['Iniciante', 'Intermediario', 'Avancado']),
            'teacher_id' => Teacher::inRandomOrder()->first()->id, // Associa o course a um teacher aleatório
        ];
    }
}
