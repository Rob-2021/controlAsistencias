<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncionarioAsignacione extends Model
{
    protected $table = 'FuncionarioAsignaciones';

    // Clave primaria compuesta: ['CodigoAsignacion', 'CodigoSectorTrabajo', 'DesdeMesAnnio', 'IdPersona']

    protected $fillable = ['IdPersona', 'CodigoSectorTrabajo', 'CodigoAsignacion', 'NroBeneficiarios', 'DesdeMesAnnio', 'HastaMesAnnio', 'MesAnnioRetiroAsignacion', 'FechaHoraRegistro', 'CodigoUsuario'];

    protected $casts = [
        'NroBeneficiarios' => 'integer',
        'FechaHoraRegistro' => 'datetime'
    ];

    protected $dates = ['FechaHoraRegistro'];

    public function asignacione()
    {
        return $this->belongsTo(Asignacione::class, 'CodigoAsignacion', 'CodigoAsignacion');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'CodigoUsuario', 'CodigoUsuario');
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacione::class, 'CodigoAsignacion');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'CodigoUsuario');
    }

}