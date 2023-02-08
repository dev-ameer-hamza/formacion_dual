<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Profesorado extends Authenticatable
{
    use HasFactory;

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
        'area',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    // relaciones

    public function rols()
    {
        return $this->belongsToMany(Rol::class,'profesorado_rol','profesorado_id','rol_id')->withPivot('start_date','end_date');
    }

    public function activeRols()
    {
        return $this->rols()->wherePivot('end_date',null);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class,'alumno_profesorado','profesorado_id','alumno_id')->withPivot('start_date','end_date');
    }

    public function grados()
    {
        return $this->belongsToMany(Grado::class,'grado_profesores','profesor_id','grado_id')
            ->withPivot('start_date','end_date');
    }

    public function activeGrado()
    {
        return $this->grados()->wherePivot('end_date',null);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class,'profesor_id');
    }

    public function tutorSeguimientos()
    {
        return $this->hasMany(SeguimientoTutor::class);
    }


    // local scopes

    public function scopeTutors($query)
    {
        return $query->whereName('tutor');
    }

    public function scopeCoordinadores($query)
    {
        return $query->whereName('coordinador');
    }

    public function isTutor()
    {
        return count($this->rols()->tutors()->wherePivotNull('end_date')->get()) > 0 ? true : false;
    }

    public function isCoordinador()
    {
        return count($this->rols()->coordinadores()->wherePivotNull('end_date')->get()) > 0 ? true : false;
    }




}
