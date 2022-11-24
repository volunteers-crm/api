<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2022 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Jobs\Files;

use App\Contracts\Eloquent\File;
use App\Enums\Queue;
use App\Models\Bot;
use App\Services\Downloader;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * @property File|Model $model
 */
class DownloadFileJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Bot $bot,
        public readonly File $model,
        public readonly string $fileId,
        public readonly string $fileUniqueId
    ) {
        $this->onQueue(Queue::Download());
        $this->afterCommit();
    }

    public function __invoke(Downloader $downloader): void
    {
        $file = $downloader->get($this->bot, $this->fileId, $this->fileUniqueId);

        $this->store($file->path, $file->filename);
    }

    public function uniqueId(): string
    {
        return implode('__', [$this->bot->id, $this->model->id, $this->fileId]);
    }

    protected function store(string $path, string $filename): void
    {
        $this->model->file()->create(compact('path', 'filename'));
    }
}
