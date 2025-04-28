<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosCargosFuncionario extends Model
{
    protected $table = 'EstadosCargosFuncionario';

    

    protected $fillable = ['CodigoEstadoCargoFuncionario', 'NombreEstadoCargoFuncionario'];

    protected $casts = [
        
    ];

    protected $dates = [];



}