<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRTramite extends Model
{
    protected $table = 'PR_Tramites';

    

    protected $fillable = ['IdTramite', 'IdProceso', 'IdPersona', 'FechaHoraInicioTramite', 'FechaHoraFinTramite', 'CodigoEstado', 'Observaciones', 'CodigoUsuario'];

    protected $casts = [
        'IdTramite' => 'integer',
        'IdProceso' => 'integer',
        'FechaHoraInicioTramite' => 'datetime',
        'FechaHoraFinTramite' => 'datetime'
    ];

    protected $dates = ['FechaHoraInicioTramite', 'FechaHoraFinTramite'];

    public function pRProceso()
    {
        return $this->belongsTo(PRProceso::class, 'IdProceso', 'IdProceso');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function pRProcesos()
    {
        return $this->hasMany(PRProceso::class, 'IdProceso');
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