<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasMemorandum extends Model
{
    protected $table = 'PersonasMemorandums';

    // Clave primaria compuesta: ['FechaEmision', 'IdPersona']

    protected $fillable = ['IdPersona', 'FechaEmision', 'CodigoTipoMemorandum', 'NroMemorandum', 'ArchivoMemo', 'CodigoEstadoMemorandum', 'Observaciones', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaEmision' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaEmision', 'FechaHoraRegistro'];



}