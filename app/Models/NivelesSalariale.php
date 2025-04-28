<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelesSalariale extends Model
{
    protected $table = 'NivelesSalariales';

    // Clave primaria compuesta: ['CodigoSectorTrabajo', 'IdNivelSalarial']

    protected $fillable = ['IdNivelSalarial', 'CodigoSectorTrabajo', 'DescripcionNivelSalarial', 'HaberBasicoMinimo', 'HaberBasicoMaximo', 'FechaInicioAplicacion', 'FechaFinalAplicacion'];

    protected $casts = [
        'IdNivelSalarial' => 'integer',
        'HaberBasicoMinimo' => 'float',
        'HaberBasicoMaximo' => 'float',
        'FechaInicioAplicacion' => 'datetime',
        'FechaFinalAplicacion' => 'datetime'
    ];

    protected $dates = ['FechaInicioAplicacion', 'FechaFinalAplicacion'];

    public function sectoresTrabajo()
    {
        return $this->belongsTo(SectoresTrabajo::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }

    public function sectoresTrabajos()
    {
        return $this->hasMany(SectoresTrabajo::class, 'CodigoSectorTrabajo');
    }

}