<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tipo_cliente_id',
        'usuario_id',
        'ciiu_id',
        'ruc',
        'razon_social',
        'sigla',
        'telefono_01',
        'telefono_02',
        'pais',
        'departamento',
        'provincia',
        'distrito',
        'direccion',
        'correo',
        'host',
        'urlimage',
    ];

    public function usuario(){
        return $this->hasOne(User::class);
    }

    public function tipo_cliente(){
        return $this->hasOne(Tipo_Cliente::class);
    }

    public function usuarios(){
        return $this->belongsToMany(User::class, 'empresa_user', 'empresa_id', 'usuario_id');
    }

    public function programaciones_emo(){
        return $this->hasMany(ProgramacionEmo::class);
    }

}
