<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRRequisitosPersona extends Model
{
    protected $table = 'PR_RequisitosPersonas';

    // Clave primaria compuesta: ['IdActividad', 'IdPersona', 'IdProceso', 'IdRequisito', 'IdTramite']

    protected $fillable = ['IdPersona', 'IdTramite', 'IdProceso', 'IdActividad', 'IdRequisito', 'Valor', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IdTramite' => 'integer',
        'IdProceso' => 'integer',
        'IdActividad' => 'integer',
        'IdRequisito' => 'integer',
        'Valor' => 'boolean',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}