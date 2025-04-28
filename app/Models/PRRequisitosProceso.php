<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PRRequisitosProceso extends Model
{
    protected $table = 'PR_RequisitosProcesos';

    // Clave primaria compuesta: ['IdProceso', 'IdRequisito']

    protected $fillable = ['IdProceso', 'IdRequisito', 'Observacion', 'idActividad'];

    protected $casts = [
        'IdProceso' => 'integer',
        'IdRequisito' => 'integer',
        'idActividad' => 'integer'
    ];

    protected $dates = [];

    public function pRProceso()
    {
        return $this->belongsTo(PRProceso::class, 'IdProceso', 'IdProceso');
    }
    public function pRRequisito()
    {
        return $this->belongsTo(PRRequisito::class, 'IdRequisito', 'IdRequisito');
    }

    public function pRProcesos()
    {
        return $this->hasMany(PRProceso::class, 'IdProceso');
    }
    public function pRRequisitos()
    {
        return $this->hasMany(PRRequisito::class, 'IdRequisito');
    }

}