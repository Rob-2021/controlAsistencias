<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposHorario extends Model
{
    protected $table = 'TiposHorarios';

    // Clave primaria compuesta: ['CodigoTipoHorario', 'CodigoTurno']

    protected $fillable = ['CodigoTipoHorario', 'CodigoTurno', 'HoraEntrada', 'HoraSalida', 'HoraMinimaEntrada', 'HoraMaximaEntrada', 'HoraMinimaSalida', 'HoraMaximaSalida', 'Observaciones', 'IncrementoDia', 'FechaHoraRegistro', 'CodigoUsuario'];

    protected $casts = [
        'HoraEntrada' => 'datetime',
        'HoraSalida' => 'datetime',
        'HoraMinimaEntrada' => 'datetime',
        'HoraMaximaEntrada' => 'datetime',
        'HoraMinimaSalida' => 'datetime',
        'HoraMaximaSalida' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['HoraEntrada', 'HoraSalida', 'HoraMinimaEntrada', 'HoraMaximaEntrada', 'HoraMinimaSalida', 'HoraMaximaSalida', 'FechaHoraRegistro'];



}