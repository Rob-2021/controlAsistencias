<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosAsistencium extends Model
{
    protected $table = 'EstadosAsistencia';

    

    protected $fillable = ['EstadoEntrada', 'EstadoSalida', 'EstadoAsistencia', 'Descripcion', 'CodigoSectorTrabajo'];

    protected $casts = [
        
    ];

    protected $dates = [];



}