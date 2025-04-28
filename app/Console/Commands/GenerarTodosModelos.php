<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;

class GenerarTodosModelos extends Command
{
    protected $signature = 'generar:modelos';
    protected $description = 'Genera modelos Eloquent con relaciones para todas las tablas';

    public function handle()
    {
        $tablas = DB::select("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_NAME != 'migrations'");

        foreach ($tablas as $tabla) {
            $nombreTabla = $tabla->TABLE_NAME;
            $modelo = Str::studly(Str::singular($nombreTabla));
            $this->call('generar:modelo', ['tabla' => $nombreTabla, '--modelo' => $modelo]);
        }

        $this->info("🎉 Todos los modelos han sido generados correctamente.");
    }
}
