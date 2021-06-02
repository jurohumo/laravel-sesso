<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_cliente';

    protected $fillable = [
        'nombre', 'descripcion'
    ];
}
