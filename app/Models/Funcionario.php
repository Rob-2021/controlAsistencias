<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'Funcionarios';

    

    protected $fillable = ['IdFuncionario', 'IdPersona', 'CodigoSectorTrabajo', 'FechaIngreso', 'FechaSalida', 'FechaCalificacion', 'AniosAntiguedad', 'FechaCalculoVacacion', 'CodigoEstadoFuncionario', 'CodigoUsuario', 'FechaHoraRegistro', 'FechaCalculoPlanilla', 'FechaCalculoVacionBK'];

    protected $casts = [
        'IdFuncionario' => 'integer',
        'FechaIngreso' => 'datetime',
        'FechaSalida' => 'datetime',
        'FechaCalificacion' => 'datetime',
        'AniosAntiguedad' => 'float',
        'FechaCalculoVacacion' => 'datetime',
        'FechaHoraRegistro' => 'datetime',
        'FechaCalculoPlanilla' => 'datetime',
        'FechaCalculoVacionBK' => 'datetime'
    ];

    protected $dates = ['FechaIngreso', 'FechaSalida', 'FechaCalificacion', 'FechaCalculoVacacion', 'FechaHoraRegistro', 'FechaCalculoPlanilla', 'FechaCalculoVacionBK'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}