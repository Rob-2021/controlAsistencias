<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MateriasConvocada extends Model
{
    protected $table = 'MateriasConvocadas';

    // Clave primaria compuesta: ['CodigoCarrera', 'IdConvocatoria', 'NumeroPlanEstudios', 'SiglaMateria', 'TipoDesignacion']

    protected $fillable = ['CodigoCarrera', 'NumeroPlanEstudios', 'SiglaMateria', 'TipoDesignacion', 'IdConvocatoria', 'IdTramite', 'TotalHoras', 'PerfilProfesional', 'IdAgrupacion', 'Grupo', 'Parentesco', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdConvocatoria' => 'integer',
        'IdTramite' => 'integer',
        'TotalHoras' => 'integer',
        'IdAgrupacion' => 'integer',
        'Grupo' => 'integer'
    ];

    protected $dates = [];

    public function convocatoriasDocente()
    {
        return $this->belongsTo(ConvocatoriasDocente::class, 'IdConvocatoria', 'IdConvocatoria');
    }
    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
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
    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
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