<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvocatoriasAdministrativo extends Model
{
    protected $table = 'ConvocatoriasAdministrativos';

    

    protected $fillable = ['IdConvocatoria', 'IdUnidad', 'CodigoConvocatoria', 'TipoConvocatoria', 'FechaSolicitud', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdConvocatoria' => 'integer',
        'IdUnidad' => 'integer',
        'FechaSolicitud' => 'datetime'
    ];

    protected $dates = ['FechaSolicitud'];

    public function organigrama()
    {
        return $this->belongsTo(Organigrama::class, 'IdUnidad', 'IdUnidad');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function organigramas()
    {
        return $this->hasMany(Organigrama::class, 'IdUnidad');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}