<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Usando a Factory para gerar 10 estudantes
        Student::factory(10)->create();
    }
}
