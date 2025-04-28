<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleItemFuncionario extends Model
{
    protected $table = 'DetalleItemFuncionario';

    // Clave primaria compuesta: ['FechaInicioCargo', 'IdFuncionario', 'NroItem']

    protected $fillable = ['IdFuncionario', 'NroItem', 'FechaInicioCargo', 'FechaFinalCargo', 'CodigoCondicionLaboral', 'CodigoCategoriaNivelSalarial', 'NroMemorandum', 'CodigoEstadoCargo', 'IdNivelSalarial', 'CodigoUsuario', 'FechaHoraRegistro', 'Observaciones', 'HaberBasicoCompleto'];

    protected $casts = [
        'IdFuncionario' => 'integer',
        'FechaInicioCargo' => 'datetime',
        'FechaFinalCargo' => 'datetime',
        'IdNivelSalarial' => 'integer',
        'FechaHoraRegistro' => 'datetime',
        'HaberBasicoCompleto' => 'float'
    ];

    protected $dates = ['FechaInicioCargo', 'FechaFinalCargo', 'FechaHoraRegistro'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'NroItem', 'NroItem');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'NroItem');
    }

}