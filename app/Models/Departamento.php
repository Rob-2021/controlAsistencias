<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'Departamentos';

    // Clave primaria compuesta: ['CodigoDepartamento', 'CodigoPais']

    protected $fillable = ['CodigoPais', 'CodigoDepartamento', 'NombreDepartamento'];

    protected $casts = [
        
    ];

    protected $dates = [];

    public function paise()
    {
        return $this->belongsTo(Paise::class, 'CodigoPais', 'CodigoPais');
    }

    public function paises()
    {
        return $this->hasMany(Paise::class, 'CodigoPais');
    }

}