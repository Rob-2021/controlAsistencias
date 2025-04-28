<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitiosControlAsistencium extends Model
{
    protected $table = 'SitiosControlAsistencia';

    

    protected $fillable = ['idSitio', 'Descripcion', 'estado'];

    protected $casts = [
        'idSitio' => 'integer',
        'estado' => 'boolean'
    ];

    protected $dates = [];



}