<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    public function profesorados()
    {
        return $this->belongsToMany(Profesorado::class,'profesorado_rol','rol_id','profesorado_id',)->withPivot('start_date','end_date');
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
}
