<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsistenciaAdministrativos extends Model
{
    protected $table = 'AsistenciaAdministrativos';
    protected $primaryKey = 'IdPersona';
    public $timestamps = false;

    protected $fillable = [
        'IdPersona',
        'CodigoTipoHorario',
        'CodigoTurno',
        'HoraEntrada',
        'HoraRegistroEntrada',
        'HoraMinimaEntrada',
        'HoraMaximaEntrada',
        'HoraSalida',
        'HoraRegistroSalida',
        'HoraMinimaSalida',
        'HoraMaximaSalida',
        'EstadoEntrada',
        'EstadoSalida',
        'Sanciones',
        'EstadoAsistencia',
        'Observaciones',
    ];
}
