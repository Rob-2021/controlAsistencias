<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionariosPlanillaPago extends Model
{
    protected $table = 'FuncionariosPlanillaPagos';

    // Clave primaria compuesta: ['Gestion', 'IdFuncionario', 'IdPersona', 'Mes']

    protected $fillable = ['IdPersona', 'IdFuncionario', 'CodigoSectorTrabajo', 'Mes', 'Gestion', 'DescripcionPapeleta', 'Cargo', 'Horas', 'Dias', 'TotalPercepcion', 'TotalDeducciones', 'LiquidoPagable', 'Devoluciones', 'TotalOtrasPercepciones', 'TipoPlanilla', 'FechaHoraRegistro'];

    protected $casts = [
        'IdFuncionario' => 'integer',
        'TotalPercepcion' => 'float',
        'TotalDeducciones' => 'float',
        'LiquidoPagable' => 'float',
        'Devoluciones' => 'float',
        'TotalOtrasPercepciones' => 'float',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function tiposPlanilla()
    {
        return $this->belongsTo(TiposPlanilla::class, 'TipoPlanilla', 'TipoPlanilla');
    }

    public function tiposPlanillas()
    {
        return $this->hasMany(TiposPlanilla::class, 'TipoPlanilla');
    }

}