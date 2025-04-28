<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'Calendario';

    

    protected $fillable = ['Fecha'];

    protected $casts = [
        'Fecha' => 'datetime'
    ];

    protected $dates = ['Fecha'];



}