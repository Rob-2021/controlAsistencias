<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRActividade extends Model
{
    protected $table = 'PR_Actividades';

    // Clave primaria compuesta: ['IdActividad', 'IdProceso']

    protected $fillable = ['IdProceso', 'IdActividad', 'Descripcion', 'IdTipoActividad', 'ActividadAnterior', 'ActividadSiguiente', 'TipoFlujoAnterior', 'TipoFlujoSiguiente', 'Unidad', 'IdRol', 'Duracion', 'Datos'];

    protected $casts = [
        'IdProceso' => 'integer',
        'IdActividad' => 'integer',
        'IdTipoActividad' => 'integer',
        'IdRol' => 'integer',
        'Duracion' => 'integer'
    ];

    protected $dates = [];

    public function pRProceso()
    {
        return $this->belongsTo(PRProceso::class, 'IdProceso', 'IdProceso');
    }
    public function pRTiposActividad()
    {
        return $this->belongsTo(PRTiposActividad::class, 'IdTipoActividad', 'IdTipoActividad');
    }
    public function pRRole()
    {
        return $this->belongsTo(PRRole::class, 'IdRol', 'IdRol');
    }

    public function pRProcesos()
    {
        return $this->hasMany(PRProceso::class, 'IdProceso');
    }
    public function pRTiposActividads()
    {
        return $this->hasMany(PRTiposActividad::class, 'IdTipoActividad');
    }
    public function pRRoles()
    {
        return $this->hasMany(PRRole::class, 'IdRol');
    }

}