<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscalaAntiguedad extends Model
{
    protected $table = 'EscalaAntiguedad';

    

    protected $fillable = ['DesdeAños', 'HastaAños', 'Porcentaje'];

    protected $casts = [
        'DesdeAños' => 'integer',
        'HastaAños' => 'float',
        'Porcentaje' => 'float'
    ];

    protected $dates = [];



}