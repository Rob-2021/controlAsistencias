<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplicacionSuspensione extends Model
{
    protected $table = 'AplicacionSuspensiones';

    

    protected $fillable = ['IdEvento', 'CodigoSectorTrabajo', 'CodigoCondicionLaboral', 'Todos', 'CodigoCategoriaFuncionario', 'CodigoCategoriaAfiliacion', 'CodigoUsuario', 'FechaHoraRegistro', 'CodigoCategoriaAgrupacion'];

    protected $casts = [
        'IdEvento' => 'integer',
        'Todos' => 'boolean',
        'CodigoCategoriaAfiliacion' => 'integer',
        'FechaHoraRegistro' => 'datetime',
        'CodigoCategoriaAgrupacion' => 'integer'
    ];

    protected $dates = ['FechaHoraRegistro'];



}