<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramacionEmo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "programaciones_emo";

    protected $fillable = [
        'empresa_id', 'fecha_programacion'
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
}
