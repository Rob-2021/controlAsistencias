<?php

use App\Http\Controllers\AsistenciaAdministrativosController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', '/asistencia');

Route::get('/asistencia', [AsistenciaAdministrativosController::class, 'index'])->name('asistencia.index');
Route::get('/asistencia/reporte', [AsistenciaAdministrativosController::class, 'reporte'])->name('asistencia.reporte');
Route::get('/asistencia/reporte/vista', [AsistenciaAdministrativosController::class, 'vistaReporte'])->name('asistencia.reporte.vista');
Route::get('/asistencia/excel', [AsistenciaAdministrativosController::class, 'exportExcel'])->name('asistencia.excel');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
