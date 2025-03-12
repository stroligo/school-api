<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    // Definindo qual modelo a Factory deve gerar
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'subject' => $this->faker->randomElement([
                'Science',
                'Mathematics',
                'Physics',
                'Chemistry',
                'Biology',
                'History',
                'Geography',
                'English',
                'Literature',
                'Computer Science',
                'Physical Education',
                'Music',
                'Art',
                'Economics',
                'Philosophy'
            ])
        ];
    }
}
