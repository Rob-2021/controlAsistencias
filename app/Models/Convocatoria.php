<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $table = 'Convocatorias';

    

    protected $fillable = ['IdConvocatoria', 'IdUnidad', 'CodigoTipoConvocatoria', 'CodigoCarrera', 'Gestion', 'GestionAcademica', 'FechaHoraRegistro', 'FechaPublicacion', 'FechaInicioRecepcion', 'FechaFinRecepcion', 'Observacion', 'NroCiteDirCarrera', 'NroCiteDecanatura', 'NroCiteDecanaturaResultados', 'CodigoUsuario', 'Estado', 'IdPublicacion'];

    protected $casts = [
        'IdConvocatoria' => 'integer',
        'IdUnidad' => 'integer',
        'FechaHoraRegistro' => 'datetime',
        'FechaPublicacion' => 'datetime',
        'FechaInicioRecepcion' => 'datetime',
        'FechaFinRecepcion' => 'datetime',
        'IdPublicacion' => 'integer'
    ];

    protected $dates = ['FechaHoraRegistro', 'FechaPublicacion', 'FechaInicioRecepcion', 'FechaFinRecepcion'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'Estado', 'CodigoEstado');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'Estado');
    }

}