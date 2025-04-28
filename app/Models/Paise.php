<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paise extends Model
{
    protected $table = 'Paises';

    

    protected $fillable = ['CodigoPais', 'NombrePais', 'Nacionalidad'];

    protected $casts = [
        
    ];

    protected $dates = [];



}