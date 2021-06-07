<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "especialidades";

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function personas(){
        return $this->belongsToMany(Persona::class, 'personas_especialidades', 'especialidad_id', 'persona_id');
    }
}
