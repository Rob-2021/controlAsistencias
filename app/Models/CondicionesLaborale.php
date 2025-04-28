<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CondicionesLaborale extends Model
{
    protected $table = 'CondicionesLaborales';

    

    protected $fillable = ['CodigoCondicionLaboral', 'CodigoSectorTrabajo', 'CodigoCategoriaFuncionario', 'DescripcionCondicionLaboral'];

    protected $casts = [
        
    ];

    protected $dates = [];

    public function categoriasFuncionario()
    {
        return $this->belongsTo(CategoriasFuncionario::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }
    public function categoriasFuncionario()
    {
        return $this->belongsTo(CategoriasFuncionario::class, 'CodigoCategoriaFuncionario', 'CodigoCategoriaFuncionario');
    }

    public function categoriasFuncionarios()
    {
        return $this->hasMany(CategoriasFuncionario::class, 'CodigoSectorTrabajo');
    }
    public function categoriasFuncionarios()
    {
        return $this->hasMany(CategoriasFuncionario::class, 'CodigoCategoriaFuncionario');
    }

}