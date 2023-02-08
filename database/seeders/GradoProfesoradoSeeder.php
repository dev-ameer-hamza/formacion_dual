<?php

namespace Database\Seeders;

use App\Models\Profesorado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoProfesoradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Profesorado::all()  as $coordinador){
            DB::table('grado_profesores')
                ->insert([
                    'profesor_id' => $coordinador->id,
                    'grado_id' => fake()->numberBetween(1,7),
                ]);
        }
    }
}
