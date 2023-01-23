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

namespace App\Console\Commands\Files;

use App\Models\File;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DeleteOldCommand extends Command
{
    protected $signature = 'files:delete-old {--force}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $this->files($this->before())->chunkById(1000, fn (Collection $files) => $files->each->delete());
    }

    protected function files(Carbon $date): Builder
    {
        return File::query()->where('created_at', '<', $date);
    }

    protected function before(): Carbon
    {
        return $this->hasForce() ? now()->addHour() : now()->subDay();
    }

    protected function hasForce(): bool
    {
        return $this->option('force');
    }
}
