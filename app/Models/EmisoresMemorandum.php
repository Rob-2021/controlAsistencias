<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmisoresMemorandum extends Model
{
    protected $table = 'EmisoresMemorandums';

    

    protected $fillable = ['IdEmisorMemorandum', 'NroItem', 'CodigoEstado', 'Cargo', 'Grado'];

    protected $casts = [
        'IdEmisorMemorandum' => 'integer'
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