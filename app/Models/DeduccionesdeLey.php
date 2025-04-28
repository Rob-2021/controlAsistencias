<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeduccionesdeLey extends Model
{
    protected $table = 'DeduccionesdeLey';

    

    protected $fillable = ['IdDescuento', 'NombreDescuento', 'Abreviaciones', 'Partida', 'CodigoLugarDeduccion', 'PorcentajeDescuento', 'TipoDescuento', 'FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'CodigoUsuario', 'FechaHoraRegistro', 'Observaciones'];

    protected $casts = [
        'IdDescuento' => 'integer',
        'PorcentajeDescuento' => 'float',
        'FechaHoraInicioValidez' => 'datetime',
        'FechaHoraFinalValidez' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'FechaHoraRegistro'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}