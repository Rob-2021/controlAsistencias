<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRTiposActividad extends Model
{
    protected $table = 'PR_TiposActividad';

    

    protected $fillable = ['IdTipoActividad', 'Descripcion'];

    protected $casts = [
        'IdTipoActividad' => 'integer'
    ];

    protected $dates = [];



}