<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriasDocentesTemporale extends Model
{
    protected $table = 'MateriasDocentesTemporales';

    

    protected $fillable = ['IdPersona', 'CodigoCarrera', 'SiglaMateria', 'NombreMateria', 'FechaInicio', 'FechaFin', 'Tipo', 'HorasMes', 'Estado', 'mes', 'gestion', 'TipoDocente', 'NombreCarrera', 'NroItem', 'Tipogrupo', 'Grupo', 'CodigoTipoDocenteMateria'];

    protected $casts = [
        
    ];

    protected $dates = [];



}