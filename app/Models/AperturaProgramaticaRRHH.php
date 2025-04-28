<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AperturaProgramaticaRRHH extends Model
{
    protected $table = 'AperturaProgramaticaRRHH';

    

    protected $fillable = ['CodigoApertura', 'Gestion', 'DescripcionApertura', 'CodigoAperturaPadre', 'TipoApertura', 'IdUnidad', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IdUnidad' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}