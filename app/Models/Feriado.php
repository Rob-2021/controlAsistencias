<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    protected $table = 'Feriados';

    

    protected $fillable = ['IDFeriado', 'Descripcion', 'Repetir', 'Estado', 'Dia', 'Mes', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IDFeriado' => 'integer',
        'Repetir' => 'boolean',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}