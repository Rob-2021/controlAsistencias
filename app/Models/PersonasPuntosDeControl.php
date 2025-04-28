<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasPuntosDeControl extends Model
{
    protected $table = 'PersonasPuntosDeControl';

    // Clave primaria compuesta: ['IdPersona', 'IdPuntoControl']

    protected $fillable = ['IdPuntoControl', 'IdPersona'];

    protected $casts = [
        'IdPuntoControl' => 'integer'
    ];

    protected $dates = [];



}