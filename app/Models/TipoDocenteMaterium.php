<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocenteMaterium extends Model
{
    protected $table = 'TipoDocenteMateria';

    

    protected $fillable = ['CodigoTipoDocenteMateria', 'Descripcion'];

    protected $casts = [
        
    ];

    protected $dates = [];



}