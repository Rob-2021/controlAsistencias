<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispositivosControlAsistencium extends Model
{
    protected $table = 'DispositivosControlAsistencia';

    

    protected $fillable = ['IdDispositivo', 'idSitio', 'IPAddress', 'Descripcion', 'Ubicacion', 'CodigoUsuario', 'FechaHoraRegistro', 'CodigoEdificioSICAU', 'Estado'];

    protected $casts = [
        'IdDispositivo' => 'integer',
        'idSitio' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function sitiosControlAsistencium()
    {
        return $this->belongsTo(SitiosControlAsistencium::class, 'idSitio', 'idSitio');
    }

    public function sitiosControlAsistencias()
    {
        return $this->hasMany(SitiosControlAsistencium::class, 'idSitio');
    }

}