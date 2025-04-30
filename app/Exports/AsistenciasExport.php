<?php

namespace App\Exports;

use App\Models\AsistenciaAdministrativo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AsistenciasExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = AsistenciaAdministrativo::with('persona')
            ->orderBy('IdPersona', 'desc');

        // Filtros de búsqueda
        if ($this->request->filled('busqueda')) {
            $busqueda = $this->request->input('busqueda');
            $palabras = preg_split('/\s+/', trim($busqueda));
            $query->whereHas('persona', function ($q) use ($palabras) {
                foreach ($palabras as $palabra) {
                    $q->where(function ($subq) use ($palabra) {
                        $subq->where('Nombres', 'like', "%$palabra%")
                            ->orWhere('Paterno', 'like', "%$palabra%")
                            ->orWhere('Materno', 'like', "%$palabra%");
                    });
                }
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

        $asistencias = $query->get();

        // Calcular atrasos acumulados por persona y mes
        $atrasosPorPersonaMes = [];
        $result = [];

        foreach ($asistencias as $asistencia) {
            $nombreCompleto = $asistencia->persona
                ? $asistencia->persona->Nombres . ' ' . $asistencia->persona->Paterno . ' ' . $asistencia->persona->Materno
                : '';
            $retrasoTexto = '';

            if ($asistencia->HoraEntrada && $asistencia->HoraRegistroEntrada) {
                $entrada  = Carbon::parse($asistencia->HoraEntrada);
                $registro = Carbon::parse($asistencia->HoraRegistroEntrada);

                if ($registro->greaterThan($entrada)) {
                    // Diferencia en segundos (con signo)
                    $segundosRetraso = $registro->diffInSeconds($entrada, false);
                    // Valor absoluto para cálculos
                    $segundosRetrasoAbs = abs($segundosRetraso);
                    $minutosRetraso    = round($segundosRetrasoAbs / 60, 2);

                    // Mostrar siempre el retraso en minutos
                    $retrasoTexto = "{$minutosRetraso} min";

                    // Si supera 5 minutos (300 s), aplicar el conteo
                    if ($segundosRetrasoAbs >= 300) {
                        $mes   = $entrada->format('Y-m');
                        $clave = $asistencia->IdPersona . '-' . $mes;
                        $atrasosPorPersonaMes[$clave] =
                            ($atrasosPorPersonaMes[$clave] ?? 0) + 1;
                        $numAtrasos = $atrasosPorPersonaMes[$clave];

                        // Texto de sanción acumulada
                        if ($numAtrasos === 4) {
                            $retrasoTexto = "{$numAtrasos} atrasos ({$minutosRetraso} min) - 0.5 día descuento";
                        } elseif ($numAtrasos === 8) {
                            $retrasoTexto = "{$numAtrasos} atrasos ({$minutosRetraso} min) - 1 día descuento";
                        } elseif ($numAtrasos === 12) {
                            $retrasoTexto = "{$numAtrasos} atrasos ({$minutosRetraso} min) - 2 días descuento";
                        } else {
                            $retrasoTexto = "{$numAtrasos} atraso(s) ({$minutosRetraso} min)";
                        }
                    }
                }
            }

            $result[] = [
                $nombreCompleto,
                $asistencia->CodigoTipoHorario,
                $asistencia->CodigoTurno,
                $asistencia->HoraEntrada,
                $asistencia->HoraRegistroEntrada,
                $retrasoTexto,
                $asistencia->HoraSalida,
                $asistencia->HoraRegistroSalida,
                $asistencia->EstadoEntrada,
                $asistencia->EstadoSalida,
                $asistencia->Sanciones,
                $asistencia->EstadoAsistencia,
                $asistencia->Observaciones,
            ];
        }

        return collect($result);
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'CodigoTipoHorario',
            'CodigoTurno',
            'HoraEntrada',
            'HoraRegistroEntrada',
            'Retraso',
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
