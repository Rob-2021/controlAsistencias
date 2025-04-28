<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRRole extends Model
{
    protected $table = 'PR_Roles';

    

    protected $fillable = ['IdRol', 'Descripcion'];

    protected $casts = [
        'IdRol' => 'integer'
    ];

    protected $dates = [];



}