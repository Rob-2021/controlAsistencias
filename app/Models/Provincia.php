<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'Provincias';

    // Clave primaria compuesta: ['CodigoDepartamento', 'CodigoPais', 'CodigoProvincia']

    protected $fillable = ['CodigoPais', 'CodigoDepartamento', 'CodigoProvincia', 'NombreProvincia'];

    protected $casts = [
        
    ];

    protected $dates = [];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'CodigoPais', 'CodigoPais');
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'CodigoDepartamento', 'CodigoDepartamento');
    }

    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'CodigoPais');
    }
    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'CodigoDepartamento');
    }

}