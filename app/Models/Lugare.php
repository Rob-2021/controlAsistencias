<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lugare extends Model
{
    protected $table = 'Lugares';

    

    protected $fillable = ['IdLugar', 'CodigoPais', 'CodigoDepartamento', 'CodigoProvincia', 'NombreLugar', 'EsCapital'];

    protected $casts = [
        'IdLugar' => 'integer',
        'EsCapital' => 'boolean'
    ];

    protected $dates = [];

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'CodigoPais', 'CodigoPais');
    }
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'CodigoDepartamento', 'CodigoDepartamento');
    }
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'CodigoProvincia', 'CodigoProvincia');
    }

    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'CodigoPais');
    }
    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'CodigoDepartamento');
    }
    public function provincias()
    {
        return $this->hasMany(Provincia::class, 'CodigoProvincia');
    }

}