<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionesExtraordinariasConvocada extends Model
{
    protected $table = 'PostulacionesExtraordinariasConvocadas';

    // Clave primaria compuesta: ['CodigoCarrera', 'Grupo', 'IdConvocatoria', 'IdPostulacion', 'TipoDenominacion', 'TipoDesignacion']

    protected $fillable = ['IdPostulacion', 'CodigoCarrera', 'TipoDenominacion', 'Grupo', 'TipoDesignacion', 'IdConvocatoria', 'IdAgrupacion', 'Calificado', 'Calificacion', 'Posicion', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdPostulacion' => 'integer',
        'Grupo' => 'integer',
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
    public function extraordinariasConvocada()
    {
        return $this->belongsTo(ExtraordinariasConvocada::class, 'CodigoCarrera', 'CodigoCarrera');
    }
    public function extraordinariasConvocada()
    {
        return $this->belongsTo(ExtraordinariasConvocada::class, 'TipoDenominacion', 'TipoDenominacion');
    }
    public function extraordinariasConvocada()
    {
        return $this->belongsTo(ExtraordinariasConvocada::class, 'Grupo', 'Grupo');
    }
    public function extraordinariasConvocada()
    {
        return $this->belongsTo(ExtraordinariasConvocada::class, 'TipoDesignacion', 'TipoDesignacion');
    }
    public function extraordinariasConvocada()
    {
        return $this->belongsTo(ExtraordinariasConvocada::class, 'IdConvocatoria', 'IdConvocatoria');
    }

    public function postulacionesDocentes()
    {
        return $this->hasMany(PostulacionesDocente::class, 'IdPostulacion');
    }
    public function extraordinariasConvocadas()
    {
        return $this->hasMany(ExtraordinariasConvocada::class, 'CodigoCarrera');
    }
    public function extraordinariasConvocadas()
    {
        return $this->hasMany(ExtraordinariasConvocada::class, 'TipoDenominacion');
    }
    public function extraordinariasConvocadas()
    {
        return $this->hasMany(ExtraordinariasConvocada::class, 'Grupo');
    }
    public function extraordinariasConvocadas()
    {
        return $this->hasMany(ExtraordinariasConvocada::class, 'TipoDesignacion');
    }
    public function extraordinariasConvocadas()
    {
        return $this->hasMany(ExtraordinariasConvocada::class, 'IdConvocatoria');
    }

}