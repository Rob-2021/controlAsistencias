<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionesItemsConvocado extends Model
{
    protected $table = 'PostulacionesItemsConvocados';

    // Clave primaria compuesta: ['IdConvocatoria', 'IdPostulacion', 'NroItem']

    protected $fillable = ['IdPostulacion', 'NroItem', 'IdConvocatoria', 'IdAgrupacion', 'Calificado', 'Calificacion', 'Posicion', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdPostulacion' => 'integer',
        'IdConvocatoria' => 'integer',
        'Calificado' => 'integer',
        'Calificacion' => 'float',
        'Posicion' => 'integer'
    ];

    protected $dates = [];

    public function itemsConvocado()
    {
        return $this->belongsTo(ItemsConvocado::class, 'NroItem', 'NroItem');
    }
    public function itemsConvocado()
    {
        return $this->belongsTo(ItemsConvocado::class, 'IdConvocatoria', 'IdConvocatoria');
    }

    public function itemsConvocados()
    {
        return $this->hasMany(ItemsConvocado::class, 'NroItem');
    }
    public function itemsConvocados()
    {
        return $this->hasMany(ItemsConvocado::class, 'IdConvocatoria');
    }

}