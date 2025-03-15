<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCitasEstado extends Command
{
    protected $signature = 'citas:update-estado';
    protected $description = 'Actualiza el estado de las citas pasadas a atendidas';

    public function handle()
    {
        $now = Carbon::now();

        // Actualizar citas pendientes que ya pasaron a "atendidas"
        $citasActualizadas = Event::where('estado', 'pendiente')
            ->where('start', '<', $now)
            ->update(['estado' => 'atendida']);

        $this->info("Se actualizaron $citasActualizadas citas a estado 'atendida'");

        return Command::SUCCESS;
    }
}
