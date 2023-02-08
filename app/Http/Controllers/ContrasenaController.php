<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\RecuperarContrasenaRequest;
use App\Models\Alumno;
use App\Models\Profesorado;
use App\Models\TutorEmpresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContrasenaController extends Controller
{
    public function recuperarContrasena(RecuperarContrasenaRequest $request) 
    {
        
        $validated = $request->validated();
        
        if($request->radioRol === 'tutorEmpresa')
        {
            return $this->sendEmailTutorEmpresa($validated);
        }
        else if($request->radioRol === 'tutorCoordinador'){
            return $this->sendEmailProfesorado($validated);
        }
        else{
            return $this->sendEmailAlumno($validated);
        }
    }

    public function sendEmailAlumno($data) {
        $alumno = Alumno::where("email", $data["email"])->first();
        $password = Str::random(8);
        $alumno->password = Hash::make($password);
        $alumno->save();

        //Enviar correo
        $to_name = "Alumno de Deusto";
        $subject = "Contraseña olvidada";
        $to_email = $data["email"];

        Mail::send('emails.email', ['contrasena' => $password], function ($mail) use ($to_email, $to_name, $subject) {
            $mail->to($to_email, $to_name)->subject($subject);
            $mail->from('from@example.com', 'Universidad de Deusto');
        });

        return redirect()->route("login");
      
        
    }
    public function sendEmailProfesorado($data) {
        $alumno = Profesorado::where("email", $data["email"])->first();
        $password = Str::random(8);
        $alumno->password = Hash::make($password);
        $alumno->save();

        //Enviar correo
        $to_name = "Profesor de Deusto";
        $subject = "Contraseña olvidada";
        $to_email = $data["email"];

        Mail::send('emails.email', ['contrasena' => $password], function ($mail) use ($to_email, $to_name, $subject) {
            $mail->to($to_email, $to_name)->subject($subject);
            $mail->from('gorka.uriarte@ikasle.egibide.org', 'Universidad de Deusto');
        });

        return redirect()->route("login");
    }
    public function sendEmailTutorEmpresa($data) {
        $alumno = TutorEmpresa::where("email", $data["email"])->first();
        $password = Str::random(8);
        $alumno->password = Hash::make($password);
        $alumno->save();

        //Enviar correo
        $to_name = "Tutor de empresa";
        $subject = "Contraseña olvidada";
        $to_email = $data["email"];

        Mail::send('emails.email', ['contrasena' => $password], function ($mail) use ($to_email, $to_name, $subject) {
            $mail->to($to_email, $to_name)->subject($subject);
            $mail->from('gorka.uriarte@ikasle.egibide.org', 'Universidad de Deusto');
        });

        return redirect()->route("login");
    }
}
