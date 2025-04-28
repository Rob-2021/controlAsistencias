<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'Estados';

    

    protected $fillable = ['CodigoEstado', 'Descripcion'];

    protected $casts = [
        
    ];

    protected $dates = [];



}