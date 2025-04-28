<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiempoTrabajo extends Model
{
    protected $table = 'TiempoTrabajo';

    

    protected $fillable = ['CodigoTiempoTrabajo', 'NombreTiempoTrabajo', 'HorasTrabajado'];

    protected $casts = [
        
    ];

    protected $dates = [];



}