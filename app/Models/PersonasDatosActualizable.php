<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasDatosActualizable extends Model
{
    protected $table = 'PersonasDatosActualizables';

    // Clave primaria compuesta: ['FechaHoraActualizacion', 'IdPersona']

    protected $fillable = ['IdPersona', 'FechaHoraActualizacion', 'CodigoNacionalidad', 'EstadoCivil', 'Direccion', 'Telefono', 'TelfCelular', 'Email', 'Discapacidad', 'CodigoUsuario', 'Observaciones'];

    protected $casts = [
        'FechaHoraActualizacion' => 'datetime',
        'Discapacidad' => 'boolean'
    ];

    protected $dates = ['FechaHoraActualizacion'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}