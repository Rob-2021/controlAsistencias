<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAfiliacion extends Model
{
    protected $table = 'CategoriaAfiliacion';

    

    protected $fillable = ['CodigoCategoriaAfiliacion', 'CodigoSectorTrabajo', 'Descripcion', 'AplicaSuspensionControlAsistencia'];

    protected $casts = [
        'CodigoCategoriaAfiliacion' => 'integer',
        'AplicaSuspensionControlAsistencia' => 'boolean'
    ];

    protected $dates = [];

    public function sectoresTrabajo()
    {
        return $this->belongsTo(SectoresTrabajo::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }

    public function sectoresTrabajos()
    {
        return $this->hasMany(SectoresTrabajo::class, 'CodigoSectorTrabajo');
    }

}