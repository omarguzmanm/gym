<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Consultamos usuarios inscritos
            $users = User::with('memberships')->get();

            foreach ($users as $user) {
                foreach ($user->memberships as $membership) {
                    // Actualizar el estado de las membresías usando una relación pivot
                    if (now() > $membership->pivot->renew_date) {
                        $membership->pivot->update(['status' => 0]);
                    }
                }
            }
        })->daily();
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}