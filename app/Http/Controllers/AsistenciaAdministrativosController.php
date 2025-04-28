<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AsistenciaAdministrativo;


class AsistenciaAdministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $asistencias = DB::select("SELECT TOP 1000 [IdPersona]
        //     ,[CodigoTipoHorario]
        //     ,[CodigoTurno]
        //     ,[HoraEntrada]
        //     ,[HoraRegistroEntrada]
        //     ,[HoraMinimaEntrada]
        //     ,[HoraMaximaEntrada]
        //     ,[HoraSalida]
        //     ,[HoraRegistroSalida]
        //     ,[HoraMinimaSalida]
        //     ,[HoraMaximaSalida]
        //     ,[EstadoEntrada]
        //     ,[EstadoSalida]
        //     ,[Sanciones]
        //     ,[EstadoAsistencia]
        //     ,[Observaciones]
        // FROM [RRHH].[dbo].[AsistenciaAdministrativos]");

        $asistencias = AsistenciaAdministrativo::orderBy('IdPersona','desc')->paginate(15);
        return view('asistencia.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AsistenciaAdministrativo $asistenciaAdministrativos)
    {
        //return view('AsistenciaAdministrativos.show', compact('asistenciaAdministrativos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsistenciaAdministrativo $asistenciaAdministrativos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsistenciaAdministrativo $asistenciaAdministrativos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsistenciaAdministrativo $asistenciaAdministrativos)
    {
        //
    }
}
