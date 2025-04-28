<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionarioDeduccione extends Model
{
    protected $table = 'FuncionarioDeducciones';

    // Clave primaria compuesta: ['Gestion', 'IdDeduccion', 'IdFuncionario', 'IdPersona', 'Mes', 'TipoDeduccion']

    protected $fillable = ['IdPersona', 'IdFuncionario', 'CodigoSectorTrabajo', 'Mes', 'Gestion', 'MesDeduccion', 'GestionDeduccion', 'IdDeduccion', 'MontoDeduccion', 'MontoDeducido', 'Saldo', 'CodigoUsuario', 'FechaHoraRegistro', 'TipoDeduccion'];

    protected $casts = [
        'IdDeduccion' => 'integer',
        'MontoDeduccion' => 'float',
        'MontoDeducido' => 'float',
        'Saldo' => 'float',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}