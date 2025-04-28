<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfiguracionPlanilla extends Model
{
    protected $table = 'ConfiguracionPlanillas';

    

    protected $fillable = ['RcIva', 'MinimoNacional', 'FechaInicioValidez', 'FechaFinalValidez', 'SalarioMinimoPresidente', 'TopeUniversidad', 'Observaciones'];

    protected $casts = [
        'RcIva' => 'float',
        'MinimoNacional' => 'float',
        'FechaInicioValidez' => 'datetime',
        'FechaFinalValidez' => 'datetime',
        'SalarioMinimoPresidente' => 'float',
        'TopeUniversidad' => 'float'
    ];

    protected $dates = ['FechaInicioValidez', 'FechaFinalValidez'];



}