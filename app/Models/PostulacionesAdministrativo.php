<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionesAdministrativo extends Model
{
    protected $table = 'PostulacionesAdministrativos';

    

    protected $fillable = ['IdPostulacion', 'IdAgrupacion', 'TipoPostulacion', 'IdPersona', 'FechaPostulacion', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdPostulacion' => 'integer',
        'IdAgrupacion' => 'integer',
        'FechaPostulacion' => 'datetime'
    ];

    protected $dates = ['FechaPostulacion'];

    public function agrupacionConvocatoriasAdministrativo()
    {
        return $this->belongsTo(AgrupacionConvocatoriasAdministrativo::class, 'IdAgrupacion', 'IdAgrupacion');
    }

    public function agrupacionConvocatoriasAdministrativos()
    {
        return $this->hasMany(AgrupacionConvocatoriasAdministrativo::class, 'IdAgrupacion');
    }

}