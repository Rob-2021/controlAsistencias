<x-layouts.public>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        IdPersona
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CodigoTipoHorario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CodigoTurno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraEntrada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraRegistroEntrada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraMinimaEntrada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraMaximaEntrada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraSalida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraRegistroSalida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraMinimaSalida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HoraMaximaSalida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EstadoEntrada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EstadoSalida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sanciones
                    </th>
                    <th scope="col" class="px-6 py-3">
                        EstadoAsistencia
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Observaciones
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asistencia)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$asistencia->IdPersona}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->CodigoTipoHorario}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->CodigoTurno}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraEntrada}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraRegistroEntrada}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraMinimaEntrada}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraMaximaEntrada}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraSalida}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraRegistroSalida}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraMinimaSalida}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->HoraMaximaSalida}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->EstadoEntrada}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->EstadoSalida}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->Sanciones}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->EstadoAsistencia}}
                        </th>
                        <th class="px-6 py-4">
                            {{$asistencia->Observaciones}}
                        </th>
                        
                        {{-- <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-blue text-xs">
                                    Editar
                                </a>

                                <form class="delete-form" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-red text-xs ml-2" type="submit">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <h1>Asistencias de Administrativos</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>IdPersona</th>
                <th>CodigoTipoHorario</th>
                <th>CodigoTurno</th>
                <th>HoraEntrada</th>
                <th>HoraRegistroEntrada</th>
                <th>HoraMinimaEntrada</th>
                <th>HoraMaximaEntrada</th>
                <th>HoraSalida</th>
                <th>HoraRegistroSalida</th>
                <th>HoraMinimaSalida</th>
                <th>HoraMaximaSalida</th>
                <th>EstadoEntrada</th>
                <th>EstadoSalida</th>
                <th>Sanciones</th>
                <th>EstadoAsistencia</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->IdPersona }}</td>
                    <td>{{ $asistencia->CodigoTipoHorario }}</td>
                    <td>{{ $asistencia->CodigoTurno }}</td>
                    <td>{{ $asistencia->HoraEntrada }}</td>
                    <td>{{ $asistencia->HoraRegistroEntrada }}</td>
                    <td>{{ $asistencia->HoraMinimaEntrada }}</td>
                    <td>{{ $asistencia->HoraMaximaEntrada }}</td>
                    <td>{{ $asistencia->HoraSalida }}</td>
                    <td>{{ $asistencia->HoraRegistroSalida }}</td>
                    <td>{{ $asistencia->HoraMinimaSalida }}</td>
                    <td>{{ $asistencia->HoraMaximaSalida }}</td>
                    <td>{{ $asistencia->EstadoEntrada }}</td>
                    <td>{{ $asistencia->EstadoSalida }}</td>
                    <td>{{ $asistencia->Sanciones }}</td>
                    <td>{{ $asistencia->EstadoAsistencia }}</td>
                    <td>{{ $asistencia->Observaciones }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    {{ $asistencias->links() }}


</x-layouts.public>