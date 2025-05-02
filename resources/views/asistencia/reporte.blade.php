<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Asistencias</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 4px 6px; text-align: left; }
        th { background: #f2f2f2; }
        h2 { text-align: center; }
        .rojo { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Reporte de Asistencias Administrativos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CodigoTurno</th>
                <th>HoraEntrada</th>
                <th>HoraRegistroEntrada</th>
                <th>Retraso</th>
                <th>HoraSalida</th>
                <th>HoraRegistroSalida</th>
                <th>EstadoEntrada</th>
                <th>EstadoSalida</th>
                {{-- <th>Sanciones</th> --}}
                <th>EstadoAsistencia</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                // inicializo el contador de atrasos POR PERSONA Y MES
                $atrasosPorPersonaMes = [];
            @endphp
        
            @foreach ($asistencias as $asistencia)
                @php
                    // datos base
                    $retrasoTexto = '';
                    if ($asistencia->HoraEntrada && $asistencia->HoraRegistroEntrada) {
                        $entrada  = \Carbon\Carbon::parse($asistencia->HoraEntrada);
                        $registro = \Carbon\Carbon::parse($asistencia->HoraRegistroEntrada);

                        if ($entrada && $registro && $registro->greaterThan($entrada)) {
                            // Obtén los segundos de diferencia SIN aplicar valor absoluto
                            // (segundo parámetro false devuelve diferencia SIGNADA)
                            $segundosRetraso = $registro->diffInSeconds($entrada, false);

                            // Ahora aplicas el valor absoluto antes de convertir a minutos
                            $segundosRetrasoAbs = abs($segundosRetraso);
                            $minutosRetraso    = round($segundosRetrasoAbs / 60, 2);

                            // Siempre mostramos al menos el retraso en minutos
                            $retrasoTexto = "{$minutosRetraso} min";

                            // Y si supera 5 minutos (300 s), entramos en conteo de sanciones
                            if ($segundosRetrasoAbs >= 300) {
                                $mes   = $entrada->format('Y-m');
                                $clave = "{$asistencia->IdPersona}-{$mes}";
                                $atrasosPorPersonaMes[$clave] = 
                                    ($atrasosPorPersonaMes[$clave] ?? 0) + 1;
                                $numAtrasos = $atrasosPorPersonaMes[$clave];

                                // Genera el texto de sanción como antes
                                if ($numAtrasos === 4) {
                                    $retrasoTexto = 
                                    "<span class='rojo'>{$numAtrasos} atrasos ({$minutosRetraso} min) - 0.5 día descuento</span>";
                                }
                                elseif ($numAtrasos === 8) {
                                    $retrasoTexto = 
                                    "<span class='rojo'>{$numAtrasos} atrasos ({$minutosRetraso} min) - 1 día descuento</span>";
                                }
                                elseif ($numAtrasos === 12) {
                                    $retrasoTexto = 
                                    "<span class='rojo'>{$numAtrasos} atrasos ({$minutosRetraso} min) - 2 días descuento</span>";
                                }
                                else {
                                    $retrasoTexto = "{$numAtrasos} atraso(s) ({$minutosRetraso} min)";
                                }
                            }
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $asistencia->persona->Nombres ?? '' }} {{ $asistencia->persona->Paterno ?? '' }} {{ $asistencia->persona->Materno ?? '' }}</td>
                    <td>{{ $asistencia->CodigoTurno }}</td>
                    <td>{{ $asistencia->HoraEntrada }}</td>
                    <td>{{ $asistencia->HoraRegistroEntrada }}</td>
                    <td>{!! $retrasoTexto !!}</td>
                    <td>{{ $asistencia->HoraSalida }}</td>
                    <td>{{ $asistencia->HoraRegistroSalida }}</td>
                    <td>{{ $asistencia->EstadoEntrada }}</td>
                    <td>{{ $asistencia->EstadoSalida }}</td>
                    {{-- <td>{{ $asistencia->Sanciones }}</td> --}}
                    <td>{{ $asistencia->EstadoAsistencia }}</td>
                    <td>{{ $asistencia->Observaciones }}</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
</body>
</html>