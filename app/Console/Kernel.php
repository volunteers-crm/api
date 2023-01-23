<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Console;

use App\Console\Commands\Files;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(Files\DeleteOldCommand::class)
            ->hourly()
            ->withoutOverlapping()
            ->runInBackground();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        if ($this->consoleRoutesExist()) {
            $this->requireConsoleRoutes();
        }
    }

    protected function requireConsoleRoutes()
    {
        require $this->consoleRoutesPath();
    }

    protected function consoleRoutesExist(): bool
    {
        return file_exists($this->consoleRoutesPath());
    }

    protected function consoleRoutesPath(): string
    {
        return base_path('routes/console.php');
    }
}
