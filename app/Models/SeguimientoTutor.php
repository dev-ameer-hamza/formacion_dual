<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoTutor extends Model
{
    use HasFactory;

    public $table = "seguimiento_tutores";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'alumno_id',
        'asistents',
        'tutorial_type',
        'objectives',
        'decisions',
        'note',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date'
    ];

    // relaciones

    public function tutor()
    {
        return $this->belongsTo(Profesorado::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

}
