<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonasTemporal extends Model
{
    protected $table = 'PersonasTemporal';

    

    protected $fillable = ['IdPersona', 'CodigoLugarEmision', 'Paterno', 'Materno', 'Nombres', 'FechaNacimiento', 'Sexo', 'IdLugarNacimiento', 'CodigoNacionalidad', 'EstadoCivil', 'Direccion', 'Telefono', 'TelfCelular', 'Email', 'CodigoImpresion', 'FechaHoraRegistro', 'Observaciones'];

    protected $casts = [
        'FechaNacimiento' => 'datetime',
        'IdLugarNacimiento' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaNacimiento', 'FechaHoraRegistro'];

    public function lugare()
    {
        return $this->belongsTo(Lugare::class, 'IdLugarNacimiento', 'IdLugar');
    }

    public function lugares()
    {
        return $this->hasMany(Lugare::class, 'IdLugarNacimiento');
    }

}