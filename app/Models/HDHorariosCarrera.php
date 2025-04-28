<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDHorariosCarrera extends Model
{
    protected $table = 'HD_HorariosCarrera';

    // Clave primaria compuesta: ['CodigoAula', 'CodigoCarrera', 'CodigoTipoGrupoMateria', 'Curso', 'Dia', 'FechahoraInicio', 'Grupo', 'HoraEntrada', 'HoraSalida', 'IdAreaDeTrabajo', 'NumeroPlanEstudios', 'SiglaMateria']

    protected $fillable = ['CodigoCarrera', 'SiglaMateria', 'CodigoTipoGrupoMateria', 'Grupo', 'NumeroPlanEstudios', 'Curso', 'CodigoAula', 'Dia', 'HoraEntrada', 'HoraSalida', 'FechahoraInicio', 'FechaHoraFinal', 'IdPersona', 'CodigoUsuario', 'FechaHoraRegistro', 'CodigoEstado', 'IdTramite', 'IdAreaDeTrabajo', 'CodigoSede', 'EsContinuo', 'EsContinuoPracticas', 'EsContinuoIntermedios', 'EsMixto'];

    protected $casts = [
        'FechahoraInicio' => 'datetime',
        'FechaHoraFinal' => 'datetime',
        'FechaHoraRegistro' => 'datetime',
        'IdTramite' => 'integer',
        'IdAreaDeTrabajo' => 'integer',
        'EsContinuo' => 'boolean',
        'EsContinuoPracticas' => 'boolean',
        'EsContinuoIntermedios' => 'boolean',
        'EsMixto' => 'boolean'
    ];

    protected $dates = ['FechahoraInicio', 'FechaHoraFinal', 'FechaHoraRegistro'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
    }
    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
    }
    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
    }

}