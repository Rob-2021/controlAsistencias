<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PapeletasSalida extends Model
{
    protected $table = 'PapeletasSalida';

    // Clave primaria compuesta: ['FechaSalida', 'HoraSalida', 'IdPersona', 'IdUnidad', 'TipoSalida']

    protected $fillable = ['IdPersona', 'IdUnidad', 'TipoSalida', 'HoraSalida', 'HoraRetorno', 'FechaSalida', 'Observaciones', 'ContadorHrs', 'codigoEstado'];

    protected $casts = [
        'IdUnidad' => 'integer',
        'FechaSalida' => 'datetime',
        'ContadorHrs' => 'float'
    ];

    protected $dates = ['FechaSalida'];



}