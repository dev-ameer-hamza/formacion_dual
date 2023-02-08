<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class TutorEmpresa extends Authenticatable
{
    use HasFactory;

    protected $table = 'tutores_empresa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'telefone',
        'expertise',
        'password'
    ];

    //protected $with = ['empresa'];

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

    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function seguimientos()
    {
        return $this->hasMany(SeguimientoEmpresa::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class,'alumno_empresa','empresa_id','alumno_id')
            ->withPivot('start_date','end_date');
    }

    // scopes

    public function scopeActualTutorEmpresa($query)
    {
        return $query->wherePivot('end_date',null);
    }

}
