<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriasSalariale extends Model
{
    protected $table = 'CategoriasSalariales';

    // Clave primaria compuesta: ['CodigoCategoriaSalarial', 'CodigoSectorTrabajo']

    protected $fillable = ['CodigoCategoriaSalarial', 'CodigoSectorTrabajo', 'DesdeAnnios', 'HastaAnnios', 'Orden', 'FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'Orden' => 'integer',
        'FechaHoraInicioValidez' => 'datetime',
        'FechaHoraFinalValidez' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'FechaHoraRegistro'];

    public function sectoresTrabajo()
    {
        return $this->belongsTo(SectoresTrabajo::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function sectoresTrabajos()
    {
        return $this->hasMany(SectoresTrabajo::class, 'CodigoSectorTrabajo');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}