<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsMovimiento extends Model
{
    protected $table = 'ItemsMovimientos';

    

    protected $fillable = ['NroItem', 'IdFuncionarioAsignada', 'CodigoEstado', 'TipoMovimiento', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IdFuncionarioAsignada' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'IdFuncionarioAsignada', 'IdFuncionario');
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'IdFuncionarioAsignada');
    }

}