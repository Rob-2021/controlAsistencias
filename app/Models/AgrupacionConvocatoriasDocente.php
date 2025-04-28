<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgrupacionConvocatoriasDocente extends Model
{
    protected $table = 'AgrupacionConvocatoriasDocentes';

    

    protected $fillable = ['IdAgrupacion', 'CodigoCarrera', 'GestionAcademica', 'TipoAgrupacion', 'FechaLanzamiento', 'FechaIniRecepcion', 'FechaFinRecepcion', 'Publicado', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdAgrupacion' => 'integer',
        'FechaLanzamiento' => 'datetime',
        'FechaIniRecepcion' => 'datetime',
        'FechaFinRecepcion' => 'datetime',
        'Publicado' => 'integer'
    ];

    protected $dates = ['FechaLanzamiento', 'FechaIniRecepcion', 'FechaFinRecepcion'];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
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