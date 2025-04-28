<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    protected $table = 'Licencias';

    // Clave primaria compuesta: ['CodigoTipoLicencia', 'FechaHoraInicio', 'IdPersona']

    protected $fillable = ['IdPersona', 'CodigoTipoLicencia', 'Observaciones', 'FechaHoraInicio', 'FechaHoraFinal', 'CodigoUsuario', 'FechaHoraRegistro'];

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