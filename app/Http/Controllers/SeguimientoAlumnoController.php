<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SeguimientoAlumnoRequest;
use App\Models\SeguimientoAlumno;
use App\Models\SeguimientoEmpresa;
use App\Models\Seguimientotutor;

class SeguimientoAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.alumnos.crear_seguimiento");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeguimientoAlumnoRequest $request)
    {
        $alumno = Auth::guard('alumno')->user();
        $validated = $request->validated();
        
        $st= SeguimientoAlumno::create([
            'date'  => $validated['periodo'],
            'activities'=> $validated['actividades_desarrolladas'],
            'reflection'  =>$validated['reflexion'],
            'problems'  => $validated['problemas'],
            'alumno_id' => $alumno->id,
        ]);



        return redirect()->route('student.seguimiento');

    }

    public function mostrarDetalleSeguimiento() {
        $seguimiento = SeguimientoAlumno::whereId($_GET["id"])->first();
        $comentarios = $seguimiento->comentarios;
        
        return view("pages.alumnos.detalle_seguimiento", [
            "seguimiento" => $seguimiento,
            "comentarios" => $comentarios,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       /** EN DESARROLLO
        * $seccionempresa=SeguimientoEmpresa::where('alumno_id',1)->first() ; //saber el codigo del tutor de empresa
        * $empresa=SeguimientoEmpresa::where('id',$seccionempresa->tutor_empresa_id)->first();
        * $seccionprofesor=Seguimientotutor::where('alumno_id',1)->first(); //ebtener el seguimiento del tutor
         *$profesor=Seguimientotutor::where('id',$seccionprofesor->profesorado_id)->first();//obtener el tutor de profesor
           
         */
        $st = SeguimientoAlumno::where('alumno_id',1)->get();
        //return view('pages.alumnos.unhistorial',['empresa' => $empresa,'profesor' => $profesor,'unhistorial' => $st]);
        return view('pages.alumnos.unhistorial',['unhistorial' => $st]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.alumnos.seguimiento',['identidad'=> '1']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $st = SeguimientoAlumno::destroy($id);
        return redirect()->route('student.historial');
    }
}
