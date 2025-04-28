<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRRequisito extends Model
{
    protected $table = 'PR_Requisitos';

    

    protected $fillable = ['IdRequisito', 'Descripcion', 'CodigoEstado'];

    protected $casts = [
        'IdRequisito' => 'integer'
    ];

    protected $dates = [];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }

    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }

}