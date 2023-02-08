<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoProfesoradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Alumno::all()  as $alumno){
            DB::table('alumno_profesorado')
                ->insert([
                    'alumno_id' => $alumno->id,
                    'profesorado_id' => fake()->numberBetween(1,10),
                    'start_date' => now()
                ]);
        }
    }
}
