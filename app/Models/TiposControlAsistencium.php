<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposControlAsistencium extends Model
{
    protected $table = 'TiposControlAsistencia';

    

    protected $fillable = ['CodigoTipoControlAsistencia', 'Descripcion', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}