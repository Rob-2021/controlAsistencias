<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControlProcesoPlanilla extends Model
{
    protected $table = 'ControlProcesoPlanilla';

    

    protected $fillable = ['IdTramite', 'MesAsistencia', 'GestionAsistencia', 'MesProceso', 'GestionProceso', 'EstadoControl'];

    protected $casts = [
        'IdTramite' => 'integer',
        'MesAsistencia' => 'integer',
        'MesProceso' => 'integer'
    ];

    protected $dates = [];

    public function pRTramite()
    {
        return $this->belongsTo(PRTramite::class, 'IdTramite', 'IdTramite');
    }

    public function pRTramites()
    {
        return $this->hasMany(PRTramite::class, 'IdTramite');
    }

}