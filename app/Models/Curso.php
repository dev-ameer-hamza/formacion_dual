<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nivel'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];

    // relaciones

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class,'alumno_curso')->withPivot('start_date','end_date');
    }

}
