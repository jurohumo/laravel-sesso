<?php

namespace App\Models\HistoriaClinica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoriaClinica extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'historia_clinica';

}
