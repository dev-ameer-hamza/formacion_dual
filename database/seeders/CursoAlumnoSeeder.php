<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoAlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $ite)
        {
            DB::table('alumno_curso')->insert([
                'alumno_id' => fake()->numberBetween(1,3),
                'curso_id' => fake()->numberBetween(1,7),
                'start_date' => fake()->date()
            ]);
        }
    }
}
