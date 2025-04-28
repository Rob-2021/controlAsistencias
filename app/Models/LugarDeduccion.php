<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LugarDeduccion extends Model
{
    protected $table = 'LugarDeduccion';

    

    protected $fillable = ['CodigoLugarDeduccion', 'NombreLugarDeduccion', 'Descripcion'];

    protected $casts = [
        
    ];

    protected $dates = [];



}