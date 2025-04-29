<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AsistenciaAdministrativo;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\AsistenciasExport;
use Maatwebsite\Excel\Facades\Excel;


class AsistenciaAdministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AsistenciaAdministrativo::with('persona')->orderBy('IdPersona', 'desc');

        if ($request->filled('busqueda')) {
            $busqueda = $request->input('busqueda');
            $query->whereHas('persona', function ($q) use ($busqueda) {
                $q->where('Nombres', 'like', "%$busqueda%")
                    ->orWhere('Paterno', 'like', "%$busqueda%")
                    ->orWhere('Materno', 'like', "%$busqueda%");
            });
        }

        // Filtro por día exacto
        if ($request->filled('dia')) {
            $query->whereDate('HoraEntrada', $request->input('dia'));
        }

        // Filtro por mes (YYYY-MM)
        if ($request->filled('mes')) {
            [$anio, $mes] = explode('-', $request->input('mes'));
            $query->whereYear('HoraEntrada', $anio)
                ->whereMonth('HoraEntrada', $mes);
        }

        // Filtro por año
        if ($request->filled('anio')) {
            $query->whereYear('HoraEntrada', $request->input('anio'));
        }

        $asistencias = $query->paginate(10)->appends($request->all());
        return view('asistencia.index', compact('asistencias'));

        // $asistencias = AsistenciaAdministrativo::orderBy('IdPersona','desc')->paginate(10);
        // return view('asistencia.index', compact('asistencias'));
    }

    public function reporte(Request $request)
    {
        $query = AsistenciaAdministrativo::with('persona')->orderBy('IdPersona', 'desc');
    
        if ($request->filled('busqueda')) {
            $busqueda = $request->input('busqueda');
            $query->whereHas('persona', function ($q) use ($busqueda) {
                $q->where('Nombres', 'like', "%$busqueda%")
                    ->orWhere('Paterno', 'like', "%$busqueda%")
                    ->orWhere('Materno', 'like', "%$busqueda%");
            });
        }
        if ($request->filled('dia')) {
            $query->whereDate('HoraEntrada', $request->input('dia'));
        }
        if ($request->filled('mes')) {
            [$anio, $mes] = explode('-', $request->input('mes'));
            $query->whereYear('HoraEntrada', $anio)
                ->whereMonth('HoraEntrada', $mes);
        }
        if ($request->filled('anio')) {
            $query->whereYear('HoraEntrada', $request->input('anio'));
        }
    
        $asistencias = $query->get();
    
        $pdf = Pdf::loadView('asistencia.reporte', compact('asistencias'))->setPaper('a4', 'landscape');
        return $pdf->download('reporte_asistencias.pdf');
    }

public function vistaReporte(Request $request)
{
    $query = AsistenciaAdministrativo::with('persona')->orderBy('IdPersona', 'desc');
    // ... mismos filtros que en reporte ...
    if ($request->filled('busqueda')) {
        $busqueda = $request->input('busqueda');
        $query->whereHas('persona', function ($q) use ($busqueda) {
            $q->where('Nombres', 'like', "%$busqueda%")
                ->orWhere('Paterno', 'like', "%$busqueda%")
                ->orWhere('Materno', 'like', "%$busqueda%");
        });
    }
    if ($request->filled('dia')) {
        $query->whereDate('HoraEntrada', $request->input('dia'));
    }
    if ($request->filled('mes')) {
        [$anio, $mes] = explode('-', $request->input('mes'));
        $query->whereYear('HoraEntrada', $anio)
            ->whereMonth('HoraEntrada', $mes);
    }
    if ($request->filled('anio')) {
        $query->whereYear('HoraEntrada', $request->input('anio'));
    }
    $asistencias = $query->get();
    return view('asistencia.reporte', compact('asistencias'));
}

public function exportExcel(Request $request)
{
    return Excel::download(new AsistenciasExport($request), 'reporte_asistencias.xlsx');
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
