<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuarios';

    

    protected $fillable = ['CodigoUsuario', 'IdPersona', 'Llave', 'IdRol', 'GestionEvalDocente'];

    protected $casts = [
        
    ];

    protected $dates = [];



}