<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'Eventos';

    

    protected $fillable = ['IdEvento', 'FechaHoraInicio', 'FechaHoraFinal', 'Opcion', 'Titulo', 'Descripcion', 'Estado', 'Unidad', 'CodigoUsuario', 'FechaHoraRegistro', 'CodigoTipoSuspension', 'IdFeriado', 'CodigoTipoHorario'];

    protected $casts = [
        'IdEvento' => 'integer',
        'FechaHoraInicio' => 'datetime',
        'FechaHoraFinal' => 'datetime',
        'Unidad' => 'integer',
        'FechaHoraRegistro' => 'datetime',
        'IdFeriado' => 'integer'
    ];

    protected $dates = ['FechaHoraInicio', 'FechaHoraFinal', 'FechaHoraRegistro'];



}