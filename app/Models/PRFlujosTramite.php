<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRFlujosTramite extends Model
{
    protected $table = 'PR_FlujosTramites';

    // Clave primaria compuesta: ['FechaHoraRecepcion', 'IdActividad', 'IdProceso', 'IdTramite']

    protected $fillable = ['IdTramite', 'IdProceso', 'IdActividad', 'FechaHoraRecepcion', 'FechaHoraDespacho', 'CodigoRecepcion', 'Proveido', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdTramite' => 'integer',
        'IdProceso' => 'integer',
        'IdActividad' => 'integer',
        'FechaHoraRecepcion' => 'datetime',
        'FechaHoraDespacho' => 'datetime'
    ];

    protected $dates = ['FechaHoraRecepcion', 'FechaHoraDespacho'];

    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
    }
    public function pRActividade()
    {
        return $this->belongsTo(PRActividade::class, 'IdProceso', 'IdProceso');
    }
    public function pRActividade()
    {
        return $this->belongsTo(PRActividade::class, 'IdActividad', 'IdActividad');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
    }
    public function pRActividades()
    {
        return $this->hasMany(PRActividade::class, 'IdProceso');
    }
    public function pRActividades()
    {
        return $this->hasMany(PRActividade::class, 'IdActividad');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}