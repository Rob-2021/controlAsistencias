<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dtproperty extends Model
{
    protected $table = 'dtproperties';

    // Clave primaria compuesta: ['id', 'property']

    protected $fillable = ['id', 'objectid', 'property', 'value', 'uvalue', 'lvalue', 'version'];

    protected $casts = [
        'id' => 'integer',
        'objectid' => 'integer',
        'version' => 'integer'
    ];

    protected $dates = [];



}