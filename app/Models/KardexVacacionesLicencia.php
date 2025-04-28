<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KardexVacacionesLicencia extends Model
{
    protected $table = 'KardexVacacionesLicencias';

    // Clave primaria compuesta: ['CodigoTipoObtencionVL', 'FechaInicio', 'IdFuncionario']

    protected $fillable = ['IdFuncionario', 'FechaCalificacion', 'AnniosAntiguedad', 'MesesAntiguedad', 'DiasAntiguedad', 'CodigoTipoObtencionVL', 'Gestion', 'FechaInicio', 'FechaFinal', 'Abonado', 'TotalDiasEmpleado', 'DiasAFavor', 'CodigoUsuario', 'FechaHoraRegistro', 'Observaciones'];

    protected $casts = [
        'IdFuncionario' => 'integer',
        'FechaCalificacion' => 'datetime',
        'FechaInicio' => 'datetime',
        'FechaFinal' => 'datetime',
        'Abonado' => 'float',
        'TotalDiasEmpleado' => 'float',
        'DiasAFavor' => 'float',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaCalificacion', 'FechaInicio', 'FechaFinal', 'FechaHoraRegistro'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'IdFuncionario', 'IdFuncionario');
    }
    public function tipoObtencionVacacionesLicencia()
    {
        return $this->belongsTo(TipoObtencionVacacionesLicencia::class, 'CodigoTipoObtencionVL', 'CodigoTipoObtencionVL');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'IdFuncionario');
    }
    public function tipoObtencionVacacionesLicencias()
    {
        return $this->hasMany(TipoObtencionVacacionesLicencia::class, 'CodigoTipoObtencionVL');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}