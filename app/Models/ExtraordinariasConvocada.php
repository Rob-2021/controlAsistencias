<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraordinariasConvocada extends Model
{
    protected $table = 'ExtraordinariasConvocadas';

    // Clave primaria compuesta: ['CodigoCarrera', 'Grupo', 'IdConvocatoria', 'TipoDenominacion', 'TipoDesignacion']

    protected $fillable = ['CodigoCarrera', 'TipoDenominacion', 'Grupo', 'TipoDesignacion', 'IdConvocatoria', 'IdTramite', 'IdPersonaAsignada', 'CategoriaAsignada', 'TotalHoras', 'Descripcion', 'PerfilProfesional', 'IdAgrupacion', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'Grupo' => 'integer',
        'IdConvocatoria' => 'integer',
        'IdTramite' => 'integer',
        'TotalHoras' => 'integer',
        'IdAgrupacion' => 'integer'
    ];

    protected $dates = [];

    public function convocatoriasDocente()
    {
        return $this->belongsTo(ConvocatoriasDocente::class, 'IdConvocatoria', 'IdConvocatoria');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function convocatoriasDocentes()
    {
        return $this->hasMany(ConvocatoriasDocente::class, 'IdConvocatoria');
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