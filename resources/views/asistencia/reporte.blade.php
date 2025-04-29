{{-- filepath: resources/views/asistencia/reporte.blade.php --}}
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
    </style>
</head>
<body>
    <h2>Reporte de Asistencias Administrativos</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                {{-- <th>CodigoTipoHorario</th> --}}
                <th>CodigoTurno</th>
                <th>HoraEntrada</th>
                <th>HoraRegistroEntrada</th>
                <th>HoraSalida</th>
                <th>HoraRegistroSalida</th>
                <th>EstadoEntrada</th>
                <th>EstadoSalida</th>
                <th>Sanciones</th>
                <th>EstadoAsistencia</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asistencias as $asistencia)
                <tr>
                    <td>
                        @if ($asistencia->persona)
                            {{ $asistencia->persona->Nombres }}
                            {{ $asistencia->persona->Paterno }}
                            {{ $asistencia->persona->Materno }}
                        @endif
                    </td>
                    {{-- <td>{{ $asistencia->CodigoTipoHorario }}</td> --}}
                    <td>{{ $asistencia->CodigoTurno }}</td>
                    <td>{{ $asistencia->HoraEntrada }}</td>
                    <td>{{ $asistencia->HoraRegistroEntrada }}</td>
                    <td>{{ $asistencia->HoraSalida }}</td>
                    <td>{{ $asistencia->HoraRegistroSalida }}</td>
                    <td>{{ $asistencia->EstadoEntrada }}</td>
                    <td>{{ $asistencia->EstadoSalida }}</td>
                    <td>{{ $asistencia->Sanciones }}</td>
                    <td>{{ $asistencia->EstadoAsistencia }}</td>
                    <td>{{ $asistencia->Observaciones }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>