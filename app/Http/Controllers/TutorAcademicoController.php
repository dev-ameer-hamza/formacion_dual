<?php

namespace App\Http\Controllers;

use App\DataTables\AlumnosDeTutorTable;
use App\DataTables\SeguimientoAlumnoTable;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\SeguimientoAlumno;
use Illuminate\Support\Facades\Auth;

class TutorAcademicoController extends Controller
{
    public function alumnos(AlumnosDeTutorTable $alumnosDeTutorTable)
    {
        return $alumnosDeTutorTable->render('pages.tutor.alumnos');
    }

    public function seguimiento(SeguimientoAlumnoTable $alumnoTable)
    {
        return $alumnoTable->render('pages.tutor.seguimiento');
    }

    public function comentario($id)
    {
        $seguimiento = SeguimientoAlumno::findOrFail($id);
        $comentarios = $seguimiento->comentarios;
        return view('pages.tutor.comentar_seguimiento',compact('seguimiento','comentarios'));
    }

    public function comentarioStore(Request $request,$id)
    {
        $tutor = Auth::guard('profesorado')->user();
        $seguimiento = SeguimientoAlumno::findOrFail($id);

        $tutor->comentarios()->create([
            'seguimiento_id' => $seguimiento->id,
            'comment' => $request->get('comentario')
        ]);

        return redirect()->route('tutor.seguimientos');
    }
}
