<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDFacultadesEdificio extends Model
{
    protected $table = 'HD_FacultadesEdificios';

    // Clave primaria compuesta: ['CodigoEdificio', 'CodigoFacultad']

    protected $fillable = ['CodigoFacultad', 'CodigoEdificio', 'CodigoEstado', 'FechaHoraRegistro', 'FechaHoraModificacion', 'CodigoUsuario'];

    protected $casts = [
        'FechaHoraRegistro' => 'datetime',
        'FechaHoraModificacion' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro', 'FechaHoraModificacion'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}