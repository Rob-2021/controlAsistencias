<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposLicencia extends Model
{
    protected $table = 'TiposLicencias';

    

    protected $fillable = ['CodigoTipoLicencia', 'Descripcion', 'CodigoTipoDuracion', 'DiasDuracion', 'CodigoTipoTiempo', 'CodigoFormaAplicacion', 'Estado', 'CodigoUsuario', 'FechaHoraRegistro'];

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