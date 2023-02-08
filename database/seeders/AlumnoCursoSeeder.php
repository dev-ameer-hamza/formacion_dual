<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Alumno::all()  as $alumno){
            DB::table('alumno_curso')
                ->insert([
                    'alumno_id' => $alumno->id,
                    'curso_id' => fake()->numberBetween(1,4),
                    'start_date' => now()
                ]);
        }
    }
}
