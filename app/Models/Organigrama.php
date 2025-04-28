<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organigrama extends Model
{
    protected $table = 'Organigrama';

    

    protected $fillable = ['IdUnidad', 'Descripcion', 'IdPadreUnidad', 'NivelUnidadOrganigrama', 'FechaHoraValidez', 'FechaHoraCreacion', 'CodigoEstadoUnidad', 'CodigoUsuario', 'FechaHoraRegistro', 'Observaciones'];

    protected $casts = [
        'IdUnidad' => 'integer',
        'IdPadreUnidad' => 'integer',
        'FechaHoraValidez' => 'datetime',
        'FechaHoraCreacion' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraValidez', 'FechaHoraCreacion', 'FechaHoraRegistro'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstadoUnidad', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstadoUnidad');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}