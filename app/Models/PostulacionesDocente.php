<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostulacionesDocente extends Model
{
    protected $table = 'PostulacionesDocentes';

    

    protected $fillable = ['IdPostulacion', 'IdAgrupacion', 'TipoPostulacion', 'IdPersona', 'FechaPostulacion', 'CodigoEstado', 'CodigoUsuario'];

    protected $casts = [
        'IdPostulacion' => 'integer',
        'IdAgrupacion' => 'integer',
        'FechaPostulacion' => 'datetime'
    ];

    protected $dates = ['FechaPostulacion'];

    public function agrupacionConvocatoriasDocente()
    {
        return $this->belongsTo(AgrupacionConvocatoriasDocente::class, 'IdAgrupacion', 'IdAgrupacion');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'CodigoEstado', 'CodigoEstado');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function agrupacionConvocatoriasDocentes()
    {
        return $this->hasMany(AgrupacionConvocatoriasDocente::class, 'IdAgrupacion');
    }
    public function estados()
    {
        return $this->hasMany(Estado::class, 'CodigoEstado');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}