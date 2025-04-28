<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasContrato extends Model
{
    protected $table = 'PersonasContrato';

    // Clave primaria compuesta: ['FechaHoraRegistro', 'IdPersona']

    protected $fillable = ['IdPersona', 'FechaHoraRegistro', 'ArchivoContrato', 'CodigoEstado', 'CodigoUsuario', 'Observaciones', 'CodigoSectorTrabajo'];

    protected $casts = [
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}