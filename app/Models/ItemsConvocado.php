<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsConvocado extends Model
{
    protected $table = 'ItemsConvocados';

    // Clave primaria compuesta: ['IdConvocatoria', 'NroItem']

    protected $fillable = ['NroItem', 'IdConvocatoria', 'TipoConvocatoria', 'IdTramite', 'IdPersonaAsignada', 'IdAgrupacion', 'CategoriaAsignada', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdConvocatoria' => 'integer',
        'IdTramite' => 'integer',
        'IdAgrupacion' => 'integer'
    ];

    protected $dates = [];

    public function item()
    {
        return $this->belongsTo(Item::class, 'NroItem', 'NroItem');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'NroItem');
    }

}