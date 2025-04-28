<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's Artisan commands.
     *
     * @return void
     */
    protected function commands()
    {
        // Carga los comandos personalizados
        $this->load(__DIR__.'/Commands');

        // Registra los comandos
        $this->commands([
            \App\Console\Commands\GenerarModelo::class,
            \App\Console\Commands\GenerarTodosModelos::class,
        ]);
    }

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Define los trabajos programados si es necesario
    }
}
