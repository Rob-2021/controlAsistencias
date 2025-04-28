<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HDConfiguracionPlanillaAsistenciaDOC extends Model
{
    protected $table = 'HD_ConfiguracionPlanillaAsistenciaDOC';

    // Clave primaria compuesta: ['CodigoCarrera', 'CodigoColumnaPlanilla']

    protected $fillable = ['CodigoCarrera', 'CodigoColumnaPlanilla', 'NombreColumnaPlanilla', 'Aplica', 'OrdenImpresion', 'Color', 'Orientacion', 'ImpresionPlanillasRango', 'CodigoEstado', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'Aplica' => 'boolean',
        'ImpresionPlanillasRango' => 'boolean',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}