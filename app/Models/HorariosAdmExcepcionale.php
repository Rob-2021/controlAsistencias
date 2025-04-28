<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorariosAdmExcepcionale extends Model
{
    protected $table = 'HorariosAdmExcepcionales';

    // Clave primaria compuesta: ['CodigoTipoHorario', 'CodigoTurno', 'FechaAplicacion', 'IdPersona']

    protected $fillable = ['IdPersona', 'CodigoTipoHorario', 'CodigoTurno', 'FechaAplicacion', 'IdPuntoControl', 'CodigoUbicacion', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaAplicacion' => 'datetime',
        'IdPuntoControl' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaAplicacion', 'FechaHoraRegistro'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}