<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutorizacionesUnidade extends Model
{
    protected $table = 'AutorizacionesUnidades';

    // Clave primaria compuesta: ['Funcion', 'IdProceso', 'NroItem', 'UnidadOrganigrama']

    protected $fillable = ['NroItem', 'UnidadOrganigrama', 'IncluirDependencia', 'IdProceso', 'Funcion'];

    protected $casts = [
        'UnidadOrganigrama' => 'integer',
        'IncluirDependencia' => 'boolean',
        'IdProceso' => 'integer'
    ];

    protected $dates = [];



}