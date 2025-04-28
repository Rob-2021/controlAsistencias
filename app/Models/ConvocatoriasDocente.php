<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvocatoriasDocente extends Model
{
    protected $table = 'ConvocatoriasDocentes';

    

    protected $fillable = ['IdConvocatoria', 'CodigoCarrera', 'GestionAcademica', 'CodigoConvocatoria', 'TipoConvocatoria', 'FechaSolicitud', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdConvocatoria' => 'integer',
        'FechaSolicitud' => 'datetime'
    ];

    protected $dates = ['FechaSolicitud'];

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