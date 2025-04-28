<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposMemorandum extends Model
{
    protected $table = 'TiposMemorandums';

    

    protected $fillable = ['CodigoTipoMemorandum', 'NombreTipoMemorandum', 'GlosaDefecto', 'CodigoEstado', 'ModificaNroItem', 'AnulaTodo', 'CodigoEstadoCargoFuncionario', 'TipoFuncionario'];

    protected $casts = [
        'ModificaNroItem' => 'boolean',
        'AnulaTodo' => 'boolean'
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