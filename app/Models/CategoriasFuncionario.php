<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriasFuncionario extends Model
{
    protected $table = 'CategoriasFuncionario';

    // Clave primaria compuesta: ['CodigoCategoriaFuncionario', 'CodigoSectorTrabajo']

    protected $fillable = ['CodigoCategoriaFuncionario', 'CodigoSectorTrabajo', 'DescripcionCategoriaFuncionario'];

    protected $casts = [
        
    ];

    protected $dates = [];

    public function sectoresTrabajo()
    {
        return $this->belongsTo(SectoresTrabajo::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }

    public function sectoresTrabajos()
    {
        return $this->hasMany(SectoresTrabajo::class, 'CodigoSectorTrabajo');
    }

}