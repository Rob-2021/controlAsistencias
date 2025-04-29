<?php
namespace App\Exports;

use App\Models\AsistenciaAdministrativo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class AsistenciasExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
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

        $asistencias = $query->get();

        // Mapea los datos para el Excel
        return $asistencias->map(function ($asistencia) {
            return [
                'Nombre' => $asistencia->persona ? $asistencia->persona->Nombres . ' ' . $asistencia->persona->Paterno . ' ' . $asistencia->persona->Materno : '',
                'CodigoTipoHorario' => $asistencia->CodigoTipoHorario,
                'CodigoTurno' => $asistencia->CodigoTurno,
                'HoraEntrada' => $asistencia->HoraEntrada,
                'HoraRegistroEntrada' => $asistencia->HoraRegistroEntrada,
                'HoraSalida' => $asistencia->HoraSalida,
                'HoraRegistroSalida' => $asistencia->HoraRegistroSalida,
                'EstadoEntrada' => $asistencia->EstadoEntrada,
                'EstadoSalida' => $asistencia->EstadoSalida,
                'Sanciones' => $asistencia->Sanciones,
                'EstadoAsistencia' => $asistencia->EstadoAsistencia,
                'Observaciones' => $asistencia->Observaciones,
            ];
        });
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