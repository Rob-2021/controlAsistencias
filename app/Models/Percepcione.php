<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Percepcione extends Model
{
    protected $table = 'Percepciones';

    

    protected $fillable = ['CodigoPercepcion', 'NombrePercepcion', 'FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'FechaHoraRegistro', 'CodigoUsuario'];

    protected $casts = [
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