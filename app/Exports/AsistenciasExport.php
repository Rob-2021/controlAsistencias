<?php
namespace App\Exports;

use App\Models\AsistenciaAdministrativo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Http\Request;

class AsistenciasExport implements FromQuery, WithHeadings, WithMapping
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $query = AsistenciaAdministrativo::with('persona')->orderBy('IdPersona', 'desc');

        if ($this->request->filled('busqueda')) {
            $busqueda = $this->request->input('busqueda');
            $query->whereHas('persona', function ($q) use ($busqueda) {
                $q->where('Nombres', 'like', "%$busqueda%")
                    ->orWhere('Paterno', 'like', "%$busqueda%")
                    ->orWhere('Materno', 'like', "%$busqueda%");
            });
        }
        if ($this->request->filled('dia')) {
            $query->whereDate('HoraEntrada', $this->request->input('dia'));
        }
        if ($this->request->filled('mes')) {
            [$anio, $mes] = explode('-', $this->request->input('mes'));
            $query->whereYear('HoraEntrada', $anio)
                ->whereMonth('HoraEntrada', $mes);
        }
        if ($this->request->filled('anio')) {
            $query->whereYear('HoraEntrada', $this->request->input('anio'));
        }
        if ($this->request->filled('codigo_turno')) {
            $query->where('CodigoTurno', $this->request->input('codigo_turno'));
        }

        return $query;
    }

    public function map($asistencia): array
    {
        return [
            $asistencia->persona ? $asistencia->persona->Nombres . ' ' . $asistencia->persona->Paterno . ' ' . $asistencia->persona->Materno : '',
            $asistencia->CodigoTipoHorario,
            $asistencia->CodigoTurno,
            $asistencia->HoraEntrada,
            $asistencia->HoraRegistroEntrada,
            $asistencia->HoraSalida,
            $asistencia->HoraRegistroSalida,
            $asistencia->EstadoEntrada,
            $asistencia->EstadoSalida,
            $asistencia->Sanciones,
            $asistencia->EstadoAsistencia,
            $asistencia->Observaciones,
        ];
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'CodigoTipoHorario',
            'CodigoTurno',
            'HoraEntrada',
            'HoraRegistroEntrada',
            'HoraSalida',
            'HoraRegistroSalida',
            'EstadoEntrada',
            'EstadoSalida',
            'Sanciones',
            'EstadoAsistencia',
            'Observaciones',
        ];
    }
}