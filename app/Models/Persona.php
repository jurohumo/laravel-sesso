<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tipo_documento_id',
        'cargo_id',
        'sexo_id',
        'numero_documento',
        'cmp_cep',
        'nombres',
        'apellido_pat',
        'apellido_mat',
        'telefono',
        'direccion',
        'fecha_nacimiento',        
    ];

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function especialidades(){
        return $this->belongsToMany(Especialidad::class, 'personas_especialidades', 'persona_id', 'especialidad_id');
    }
}
