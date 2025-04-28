<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganigramaCarrera extends Model
{
    protected $table = 'OrganigramaCarreras';

    // Clave primaria compuesta: ['CodigoCarrera', 'IdUnidad']

    protected $fillable = ['IdUnidad', 'CodigoCarrera', 'CodigoEstado', 'fechaHoraRegistro'];

    protected $casts = [
        'IdUnidad' => 'integer',
        'fechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['fechaHoraRegistro'];

    public function organigrama()
    {
        return $this->belongsTo(Organigrama::class, 'IdUnidad', 'IdUnidad');
    }

    public function organigramas()
    {
        return $this->hasMany(Organigrama::class, 'IdUnidad');
    }

}