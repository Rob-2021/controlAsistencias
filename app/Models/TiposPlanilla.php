<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposPlanilla extends Model
{
    protected $table = 'TiposPlanilla';

    

    protected $fillable = ['TipoPlanilla', 'NombreTipoPlanilla', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}