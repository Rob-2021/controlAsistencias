<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriasPeriodosTemp extends Model
{
    protected $table = 'MateriasPeriodosTemp';

    

    protected $fillable = ['Idpersona', 'CodigoCarrera', 'SiglaMateria', 'NombreMateria', 'num', 'mesAnnioInicio', 'mesAnnioFin'];

    protected $casts = [
        'CodigoCarrera' => 'integer',
        'num' => 'integer',
        'mesAnnioInicio' => 'datetime',
        'mesAnnioFin' => 'datetime'
    ];

    protected $dates = ['mesAnnioInicio', 'mesAnnioFin'];



}