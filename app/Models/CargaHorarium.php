<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargaHorarium extends Model
{
    protected $table = 'CargaHoraria';

    // Clave primaria compuesta: ['FechaInicio', 'Grupo', 'IdFuncionario', 'NroItem', 'TipoGrupo']

    protected $fillable = ['IdFuncionario', 'NroItem', 'Grupo', 'TipoGrupo', 'FechaInicio', 'FechaFin', 'HorasSemana', 'IdTipoObservacion', 'CodigoTipoDocenteMateria', 'CodigoUsuario', 'FechaHoraRegistro', 'Sede'];

    protected $casts = [
        'IdFuncionario' => 'integer',
        'FechaInicio' => 'datetime',
        'FechaFin' => 'datetime',
        'HorasSemana' => 'integer',
        'IdTipoObservacion' => 'integer',
        'FechaHoraRegistro' => 'datetime',
        'Sede' => 'integer'
    ];

    protected $dates = ['FechaInicio', 'FechaFin', 'FechaHoraRegistro'];

    public function tipoDocenteMaterium()
    {
        return $this->belongsTo(TipoDocenteMaterium::class, 'CodigoTipoDocenteMateria', 'CodigoTipoDocenteMateria');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function tipoDocenteMaterias()
    {
        return $this->hasMany(TipoDocenteMaterium::class, 'CodigoTipoDocenteMateria');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}