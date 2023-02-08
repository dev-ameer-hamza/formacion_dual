<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AlumnoSeeder::class,
            RolSeeder::class,
            EmpresaSeeder::class,
            TutorEmpresaSeeder::class,
            ProfesoradoSeeder::class,
            ProfesoradoRolSeeder::class,
            GradoSeeder::class,
            AlumnoGradoSeeder::class,
            AlumnoCursoSeeder::class,
            AlumnoEmpresaSeeder::class,
            AlumnoProfesoradoSeeder::class,
            GradoProfesoradoSeeder::class,
            EvaluacionSeeder::class,
        ]);
    }
}
