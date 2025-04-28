<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorariosAdministrativo extends Model
{
    protected $table = 'HorariosAdministrativos';

    // Clave primaria compuesta: ['CodigoTipoHorario', 'CodigoTurno', 'Dia', 'FechaHoraInicio', 'IdPersona']

    protected $fillable = ['IdPersona', 'CodigoTipoHorario', 'CodigoTurno', 'Dia', 'FechaHoraInicio', 'FechaHoraFinal', 'CodigoTipocontrolAsistencia', 'idPuntoControl', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaHoraInicio' => 'datetime',
        'FechaHoraFinal' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraInicio', 'FechaHoraFinal', 'FechaHoraRegistro'];



}