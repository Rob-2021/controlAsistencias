<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectoresTrabajo extends Model
{
    protected $table = 'SectoresTrabajo';

    

    protected $fillable = ['CodigoSectorTrabajo', 'NombreSector'];

    protected $casts = [
        
    ];

    protected $dates = [];



}