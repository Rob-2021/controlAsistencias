<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacione extends Model
{
    protected $table = 'Asignaciones';

    

    protected $fillable = ['CodigoAsignacion', 'NombreAsignacion', 'MinimoBeneficiario', 'MaximoBeneficiario', 'MesesAsignacion', 'CantidadMinimosNacionales', 'EstadoAsignacion', 'FechaHoraRegistro', 'CodigoUsuario'];

    protected $casts = [
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}