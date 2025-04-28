<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoObtencionVacacionesLicencia extends Model
{
    protected $table = 'TipoObtencionVacacionesLicencias';

    

    protected $fillable = ['CodigoTipoObtencionVL', 'NombreTipoObtencionVL', 'CodigoUsuario', 'FechaHoraRegistro', 'Observaciones'];

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