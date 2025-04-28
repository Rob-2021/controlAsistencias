<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'Cargos';

    

    protected $fillable = ['IdCargo', 'NombreCargo', 'NombreCortoCargo', 'CodigoMateriaDocente', 'Funciones', 'CodigoEstadoCargo', 'CodigoUsuario', 'FechaHoraRegistro', 'CodigoSectorTrabajo'];

    protected $casts = [
        'IdCargo' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstadoCargo', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }
    public function sectoresTrabajo()
    {
        return $this->belongsTo(SectoresTrabajo::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }

    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstadoCargo');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }
    public function sectoresTrabajos()
    {
        return $this->hasMany(SectoresTrabajo::class, 'CodigoSectorTrabajo');
    }

}