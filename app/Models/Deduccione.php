<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduccione extends Model
{
    protected $table = 'Deducciones';

    

    protected $fillable = ['IdDeduccion', 'NombreDeduccion', 'CodigoLugarDeduccion', 'Porcentaje', 'MontoFijo', 'Dias', 'DescuentoRecurrente', 'AplicadoA', 'EstadoDeduccion', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IdDeduccion' => 'integer',
        'Porcentaje' => 'float',
        'MontoFijo' => 'float',
        'Dias' => 'integer',
        'DescuentoRecurrente' => 'boolean',
        'AplicadoA' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function lugarDeduccion()
    {
        return $this->belongsTo(LugarDeduccion::class, 'CodigoLugarDeduccion', 'CodigoLugarDeduccion');
    }
    public function categoriaAfiliacion()
    {
        return $this->belongsTo(CategoriaAfiliacion::class, 'AplicadoA', 'CodigoCategoriaAfiliacion');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'EstadoDeduccion', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function lugarDeduccions()
    {
        return $this->hasMany(LugarDeduccion::class, 'CodigoLugarDeduccion');
    }
    public function categoriaAfiliacions()
    {
        return $this->hasMany(CategoriaAfiliacion::class, 'AplicadoA');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'EstadoDeduccion');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}