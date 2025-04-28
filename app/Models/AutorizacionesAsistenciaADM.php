<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutorizacionesAsistenciaADM extends Model
{
    protected $table = 'AutorizacionesAsistenciaADM';

    // Clave primaria compuesta: ['FechaHoraInicio', 'IdPersona']

    protected $fillable = ['IdPersona', 'FechaHoraInicio', 'FechaHoraFinal', 'CodigoTipoAutorizacion', 'EstadoAsistenciaAutorizacion', 'Observaciones', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaHoraInicio' => 'datetime',
        'FechaHoraFinal' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraInicio', 'FechaHoraFinal', 'FechaHoraRegistro'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}