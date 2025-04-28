<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRUsuariosRole extends Model
{
    protected $table = 'PR_UsuariosRoles';

    // Clave primaria compuesta: ['CodigoUsuario', 'IdRol']

    protected $fillable = ['CodigoUsuario', 'IdRol', 'sistema', 'CodigoFacultad'];

    protected $casts = [
        'IdRol' => 'integer'
    ];

    protected $dates = [];



}