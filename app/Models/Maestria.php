<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maestria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'maestrias';

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function personas(){
        return $this->belongsToMany(Persona::class, 'personas_maestrias', 'maestria_id', 'persona_id')->withTimestamps();
    }
}
