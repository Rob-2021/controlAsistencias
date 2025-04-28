<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'Items';

    

    protected $fillable = ['NroItem', 'IdUnidad', 'IdCargo', 'IdNivelSalarial', 'CodigoSectortrabajo', 'EstadoCargoUnidad', 'CodigoTiempoTrabajo', 'RecursosPropios', 'CodigoAperturaProgramatica', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IdUnidad' => 'integer',
        'IdCargo' => 'integer',
        'IdNivelSalarial' => 'integer',
        'RecursosPropios' => 'boolean',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];



}