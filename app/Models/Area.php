<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre', 'descripcion', 'empresa_id'
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

}
