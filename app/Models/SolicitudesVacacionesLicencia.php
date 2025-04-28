<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudesVacacionesLicencia extends Model
{
    protected $table = 'SolicitudesVacacionesLicencias';

    // Clave primaria compuesta: ['FechaInicio', 'IdFuncionario']

    protected $fillable = ['IdFuncionario', 'CodigoTipoObtencionVL', 'Dias', 'FechaInicio', 'FechaFinal', 'FechaReincorporacion', 'Estado', 'CodigoUsuario', 'FechaHoraRegistro', 'Observaciones', 'IdTramite'];

    protected $casts = [
        'IdFuncionario' => 'integer',
        'Dias' => 'float',
        'FechaInicio' => 'datetime',
        'FechaFinal' => 'datetime',
        'FechaReincorporacion' => 'datetime',
        'FechaHoraRegistro' => 'datetime',
        'IdTramite' => 'integer'
    ];

    protected $dates = ['FechaInicio', 'FechaFinal', 'FechaReincorporacion', 'FechaHoraRegistro'];

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
    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
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
    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
    }

}