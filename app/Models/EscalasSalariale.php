<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscalasSalariale extends Model
{
    protected $table = 'EscalasSalariales';

    // Clave primaria compuesta: ['CodigoCategoria', 'CodigoSectorTrabajo', 'IdNivelSalarial']

    protected $fillable = ['CodigoCategoria', 'IdNivelSalarial', 'CodigoSectorTrabajo', 'HaberBasico', 'MontoHora', 'FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'CodigoUsuario', 'FechaHoraRegistro'];

    protected $casts = [
        'IdNivelSalarial' => 'integer',
        'HaberBasico' => 'float',
        'MontoHora' => 'float',
        'FechaHoraInicioValidez' => 'datetime',
        'FechaHoraFinalValidez' => 'datetime',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraInicioValidez', 'FechaHoraFinalValidez', 'FechaHoraRegistro'];

    public function categoriasSalariale()
    {
        return $this->belongsTo(CategoriasSalariale::class, 'CodigoCategoria', 'CodigoCategoriaSalarial');
    }
    public function nivelesSalariale()
    {
        return $this->belongsTo(NivelesSalariale::class, 'IdNivelSalarial', 'IdNivelSalarial');
    }
    public function categoriasSalariale()
    {
        return $this->belongsTo(CategoriasSalariale::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }
    public function nivelesSalariale()
    {
        return $this->belongsTo(NivelesSalariale::class, 'CodigoSectorTrabajo', 'CodigoSectorTrabajo');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function categoriasSalariales()
    {
        return $this->hasMany(CategoriasSalariale::class, 'CodigoCategoria');
    }
    public function nivelesSalariales()
    {
        return $this->hasMany(NivelesSalariale::class, 'IdNivelSalarial');
    }
    public function categoriasSalariales()
    {
        return $this->hasMany(CategoriasSalariale::class, 'CodigoSectorTrabajo');
    }
    public function nivelesSalariales()
    {
        return $this->hasMany(NivelesSalariale::class, 'CodigoSectorTrabajo');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}