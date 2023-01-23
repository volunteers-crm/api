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

namespace App\Jobs\Files;

use App\Enums\File as Disk;
use App\Enums\Queue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteFileJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected Disk $disk = Disk::Private;

    public function __construct(
        public readonly string $path
    ) {
        $this->onQueue(Queue::Files());
        $this->afterCommit();
    }

    public function __invoke(): void
    {
        $this->storage()->delete($this->path);
    }

    public function uniqueId(): string
    {
        return $this->path;
    }

    protected function storage(): Filesystem
    {
        return Storage::disk($this->disk->value);
    }
}
