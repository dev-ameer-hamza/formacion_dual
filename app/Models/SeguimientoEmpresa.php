<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoEmpresa extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'alunmo_id',
        'tutor_empresa_id',
        'observation',
        'grade'
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

    public function tutorEmpresa()
    {
        return $this->belongsTo(TutorEmpresa::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

}
