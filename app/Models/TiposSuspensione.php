<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposSuspensione extends Model
{
    protected $table = 'TiposSuspensiones';

    

    protected $fillable = ['CodigoTipoSuspension', 'Descripcion', 'Estado', 'ModificaEstadoAsistencia', 'ModificaHorarios', 'ControlarAtrasos', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'ModificaEstadoAsistencia' => 'boolean',
        'ModificaHorarios' => 'boolean',
        'ControlarAtrasos' => 'boolean',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}