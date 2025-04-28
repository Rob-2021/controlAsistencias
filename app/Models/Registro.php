<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'Registros';

    

    protected $fillable = ['id', 'idPersona', 'FechaHora', 'TipoFuncionario', 'IdDispositivo', 'enLinea'];

    protected $casts = [
        'id' => 'integer',
        'FechaHora' => 'datetime',
        'IdDispositivo' => 'integer',
        'enLinea' => 'boolean'
    ];

    protected $dates = ['FechaHora'];



}