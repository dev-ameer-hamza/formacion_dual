<?php

namespace Database\Seeders;

use App\Models\Curso;
use Database\Factories\CursoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::factory()->count(7)->has(Curso::factory()->count(4),'cursos')->create();
    }
}
