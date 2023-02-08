<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    public $table = 'evaluaciones';

    protected $fillable = [
        'final_grade',
        'year',
        'alumno_id',
        'curso_id',
        "grade_empresa",
        "grade_academic"
    ];

    // relaciones

    public function curso()
    {
        return$this->belongsTo(Curso::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
