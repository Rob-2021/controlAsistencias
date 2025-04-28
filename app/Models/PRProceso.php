<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRProceso extends Model
{
    protected $table = 'PR_Procesos';

    

    protected $fillable = ['IdProceso', 'Descripcion', 'FechaHoraRegistro', 'CodigoUsuario', 'Observaciones', 'Carpeta'];

    protected $casts = [
        'IdProceso' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}