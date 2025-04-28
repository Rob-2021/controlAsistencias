<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionesMateriasConvocada extends Model
{
    protected $table = 'PostulacionesMateriasConvocadas';

    // Clave primaria compuesta: ['CodigoCarrera', 'IdConvocatoria', 'IdPostulacion', 'NumeroPlanEstudios', 'SiglaMateria', 'TipoDesignacion']

    protected $fillable = ['IdPostulacion', 'CodigoCarrera', 'NumeroPlanEstudios', 'SiglaMateria', 'TipoDesignacion', 'IdConvocatoria', 'IdAgrupacion', 'Calificado', 'Calificacion', 'Posicion', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdPostulacion' => 'integer',
        'IdConvocatoria' => 'integer',
        'IdAgrupacion' => 'integer',
        'Calificado' => 'integer',
        'Calificacion' => 'float',
        'Posicion' => 'integer'
    ];

    protected $dates = [];

    public function postulacionesDocente()
    {
        return $this->belongsTo(PostulacionesDocente::class, 'IdPostulacion', 'IdPostulacion');
    }
    public function materiasConvocada()
    {
        return $this->belongsTo(MateriasConvocada::class, 'CodigoCarrera', 'CodigoCarrera');
    }
    public function materiasConvocada()
    {
        return $this->belongsTo(MateriasConvocada::class, 'NumeroPlanEstudios', 'NumeroPlanEstudios');
    }
    public function materiasConvocada()
    {
        return $this->belongsTo(MateriasConvocada::class, 'SiglaMateria', 'SiglaMateria');
    }
    public function materiasConvocada()
    {
        return $this->belongsTo(MateriasConvocada::class, 'TipoDesignacion', 'TipoDesignacion');
    }
    public function materiasConvocada()
    {
        return $this->belongsTo(MateriasConvocada::class, 'IdConvocatoria', 'IdConvocatoria');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function postulacionesDocentes()
    {
        return $this->hasMany(PostulacionesDocente::class, 'IdPostulacion');
    }
    public function materiasConvocadas()
    {
        return $this->hasMany(MateriasConvocada::class, 'CodigoCarrera');
    }
    public function materiasConvocadas()
    {
        return $this->hasMany(MateriasConvocada::class, 'NumeroPlanEstudios');
    }
    public function materiasConvocadas()
    {
        return $this->hasMany(MateriasConvocada::class, 'SiglaMateria');
    }
    public function materiasConvocadas()
    {
        return $this->hasMany(MateriasConvocada::class, 'TipoDesignacion');
    }
    public function materiasConvocadas()
    {
        return $this->hasMany(MateriasConvocada::class, 'IdConvocatoria');
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