<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsConvocatorium extends Model
{
    protected $table = 'ItemsConvocatoria';

    // Clave primaria compuesta: ['IdConvocatoria', 'NroItem']

    protected $fillable = ['IdConvocatoria', 'NroItem', 'CodigoCondicionLaboral', 'IdTramite', 'PerfilProfesional', 'Grupo', 'Parentesco', 'FechaHoraRegistro', 'CodigoUsuario', 'Estado', 'IdPersona', 'RecursosPropios'];

    protected $casts = [
        'IdConvocatoria' => 'integer',
        'IdTramite' => 'integer',
        'Grupo' => 'integer',
        'FechaHoraRegistro' => 'datetime',
        'RecursosPropios' => 'boolean'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'NroItem', 'NroItem');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'NroItem');
    }

}