<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autoridade extends Model
{
    protected $table = 'Autoridades';

    // Clave primaria compuesta: ['IdCargo', 'IdPersona']

    protected $fillable = ['IdPersona', 'IdCargo', 'Prefijo', 'Designacion', 'CodigoEstado', 'Email', 'IdPersonaSuperior'];

    protected $casts = [
        'IdCargo' => 'integer'
    ];

    protected $dates = [];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersona', 'IdPersona');
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'IdPersonaSuperior', 'IdPersona');
    }

    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersona');
    }
    public function personas()
    {
        return $this->hasMany(Persona::class, 'IdPersonaSuperior');
    }

}