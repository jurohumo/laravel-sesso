<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciiu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ciiu';

    protected $fillable = [
        'nombre', 'codigo'
    ];
}
