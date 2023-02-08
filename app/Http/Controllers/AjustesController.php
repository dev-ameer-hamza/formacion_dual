<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Profesorado;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjustesController extends Controller
{
    public function editAjustes()
    {
        if(auth()->guard('alumno')->check()){
        $ajustes=Auth::guard('alumno')->user();
        $extra="";
        return view('pages.ajustes',['ajustes' => $ajustes,'extra'=>$extra]);
   
        }

        if(auth()->guard('profesorado')->check()){
         $ajustes=Auth::guard('profesorado')->user(); 
         $extra="nada"; 
         if($ajustes->istutor() && $ajustes->isCoordinador()) 
         $extra="Coordinador y tutor";
         else
         {
            if($ajustes->istutor())
            $extra="Tutor";
            elseif($ajustes->isCoordinador())
            $extra="Coordinador";
         }
        return view('pages.ajustes',['ajustes' => $ajustes,'extra'=>$extra]);
   
        }
        
        if(auth()->guard('empresa')->check()){
         $ajustes=Auth::guard('empresa')->user();  
         $extra=Empresa::find($ajustes->empresa_id); 
        return view('pages.ajustes',['ajustes' => $ajustes,'extra'=>$extra]);
    
        }
        
       
    }
}
