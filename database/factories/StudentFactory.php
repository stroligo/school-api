<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    // Definindo qual modelo a Factory deve gerar
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'birthdate' => $this->faker->date('Y-m-d', '2006-12-31'),
            'grade' => $this->faker->randomElement(['9th', '10th', '11th', '12th']),
        ];
    }
}
