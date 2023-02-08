<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\TutorEmpresa;

class HistorialController extends Controller
{
    public function index()
    {
        $alumno = Auth::guard('alumno')->user();
        $alum = Alumno::whereId($alumno->id)->with(['grados','cursos','evaluaciones',"tutorEmpresas"])->first();
        //          SIN ACABAR

        
        //dd($alum->evaluaciones);
        //dd($alum->tutorEmpresas);
        
        $tutoresEmpresa = $alum->tutorEmpresas()->wherePivot('end_date','<>',null)->get();
       $grados = $alum->grados;
       $cursos = $alum->cursos;

        
        //dd("")*/
;
        return view('pages.alumnos.historial');
    }
}
