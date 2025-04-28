<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasPercepcionOtrasInstitucione extends Model
{
    protected $table = 'PersonasPercepcionOtrasInstituciones';

    // Clave primaria compuesta: ['IdPersona', 'Institucion', 'Nro']

    protected $fillable = ['Nro', 'IdPersona', 'Institucion', 'Tipo', 'Cargo', 'HorasMes', 'CodigoTiempo', 'TotalGanado', 'CodigoUsuario', 'FechaHoraRegistro', 'CodigoEstado'];

    protected $casts = [
        'Nro' => 'integer',
        'HorasMes' => 'float',
        'TotalGanado' => 'float',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }

}