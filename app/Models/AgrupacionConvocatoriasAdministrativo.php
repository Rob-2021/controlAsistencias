<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgrupacionConvocatoriasAdministrativo extends Model
{
    protected $table = 'AgrupacionConvocatoriasAdministrativos';

    

    protected $fillable = ['IdAgrupacion', 'TipoAgrupacion', 'FechaLanzamiento', 'FechaIniRecepcion', 'FechaFinRecepcion', 'Publicado', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdAgrupacion' => 'integer',
        'FechaLanzamiento' => 'datetime',
        'FechaIniRecepcion' => 'datetime',
        'FechaFinRecepcion' => 'datetime',
        'Publicado' => 'integer'
    ];

    protected $dates = ['FechaLanzamiento', 'FechaIniRecepcion', 'FechaFinRecepcion'];



}