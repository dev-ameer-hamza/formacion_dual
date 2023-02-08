<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "name",
        "is_dual"
    ];
    // relaciones

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    public function coordinadores()
    {
        return $this->belongsToMany(Profesorado::class,'grado_profesores')->withTimestamps();
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class,'alumno_grado')
            ->withPivot('start_date','end_date')
            ->withTimestamps();
    }
}
