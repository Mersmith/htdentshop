<?php

namespace App\Console;

use App\Models\Orden;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
/*El Console directorio contiene todos los comandos personalizados de Artisan para su aplicación.
Estos comandos se pueden generar usando el make:command comando. 
Este directorio también alberga el kernel de su consola, que es donde se registran sus comandos personalizados de Artisan y se definen sus tareas programadas.*/

class Kernel extends ConsoleKernel
{
    //Defina el programa de comandos de la aplicación.
    //Su programa de tareas se define en el método app/Console/Kernel.php del archivo schedule.
    protected function schedule(Schedule $schedule)
    {
        //Además de programar mediante cierres, también puede programar invokable objects. Los objetos invocables son clases simples de PHP que contienen un __invoke método.
        $schedule->call(function () {

            $hora = now()->subMinute(10);

            $ordenes = Orden::where('estado', 1)->whereTime('created_at', '<=', $hora)->get();

            foreach ($ordenes as $orden) {

                $items = json_decode($orden->contenido);

                foreach ($items as $item) {
                    anularOrden($item);
                }

                $orden->estado = 5;

                $orden->save();
            }
        })->everyMinute();
    }

    //Registra los comandos para la aplicación.
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
