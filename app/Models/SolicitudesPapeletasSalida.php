<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudesPapeletasSalida extends Model
{
    protected $table = 'SolicitudesPapeletasSalida';

    

    protected $fillable = ['IdPersona', 'TipoSalida', 'FechaSalida', 'HoraSalida', 'HoraRetorno', 'CodigoEstado', 'CodigoUsuario', 'Observaciones', 'IdTramite', 'idUnidad'];

    protected $casts = [
        'FechaSalida' => 'datetime',
        'IdTramite' => 'integer',
        'idUnidad' => 'integer'
    ];

    protected $dates = ['FechaSalida'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }
    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
    }
    public function organigrama()
    {
        return $this->belongsTo(Organigrama::class, 'idUnidad', 'IdUnidad');
    }

    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }
    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
    }
    public function organigramas()
    {
        return $this->hasMany(Organigrama::class, 'idUnidad');
    }

}