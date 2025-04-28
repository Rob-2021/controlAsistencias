<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasEstudio extends Model
{
    protected $table = 'PersonasEstudios';

    // Clave primaria compuesta: ['FechaEmision', 'IdNivelEstudio', 'IdPersona', 'Institucion', 'ProvisionNacional', 'Titulo']

    protected $fillable = ['IdPersona', 'FechaEmision', 'IdNivelEstudio', 'Titulo', 'Estado', 'Institucion', 'ProvisionNacional', 'HrsAcademicas', 'GradoAbreviado', 'CodigoEstado', 'ImagenAnverso', 'ImagenReverso', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaEmision' => 'datetime',
        'ProvisionNacional' => 'boolean',
        'HrsAcademicas' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaEmision', 'FechaHoraRegistro'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}