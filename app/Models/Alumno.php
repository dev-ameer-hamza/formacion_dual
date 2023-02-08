<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Alumno extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'alumnos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'dni',
        'email',
        'tel',
        'formacion_dual',
        'birth_date',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
    ];




    public function tutores()
    {
        return $this->belongsToMany(Profesorado::class,'alumno_profesorado')->withPivot('start_date','end_date');
    }

    public function activeTutor()
    {
        return $this->tutores()->wherePivot('end_date',null);
    }

    public function tutorEmpresas()
    {
        return $this->belongsToMany(TutorEmpresa::class,'alumno_empresa','alumno_id','empresa_id')->withPivot('start_date','end_date');
    }

    public function activeTutorEmpresa()
    {
        return $this->tutorEmpresas()->wherePivot('end_date',null);
    }


    public function grados()
    {
        return $this->belongsToMany(Grado::class,'alumno_grado','alumno_id','grado_id')->withPivot('start_date','end_date');
    }

    public function activeGrado()
    {
        return $this->grados()->wherePivot('end_date',null);
    }

    public function evaluaciones(){
        return $this->hasMany(Evaluacion::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class,'alumno_curso')->withPivot('start_date','end_date');
    }

    public function activeCurso()
    {
        return $this->cursos()->wherePivot('end_date',null);
    }

    public function cursosTerminados($cursoId)
    {
        return $this->cursos()->wherePivot('end_date','<>',null)->wherePivot('curso_id',$cursoId);
    }

    public function tutorSeguimientos()
    {
        return $this->hasMany(SeguimientoTutor::class);
    }

    public function alumnoSeguimientos()
    {
        return $this->hasMany(SeguimientoAlumno::class);
    }
    public function tutorEmpresaSeguimientos()
    {
        return $this->hasMany(SeguimientoEmpresa::class);
    }

    // scopes

    public function scopeActualTutorEmpresa($query)
    {
        return $query->wherePivot('end_date',null);
    }





}
