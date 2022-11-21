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

namespace App\Helpers;

use App\Enums\File as FileDisk;
use App\Models\Bot;
use App\Models\File;
use App\Models\Message;
use DragonCode\Support\Concerns\Makeable;
use DragonCode\Support\Facades\Filesystem\Path;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

/**
 * @method static Files make(Bot $bot, Message $message)
 */
class Files
{
    use Makeable;

    public function __construct(
        protected ?Bot     $bot = null,
        protected ?Message $message = null
    ) {
    }

    public function get(): string
    {
        if ($path = $this->message->file?->path) {
            return $this->directory($path);
        }

        $path = $this->download(
            $this->directory($this->id())
        );

        return $this->directory(
            $this->store($path)->path
        );
    }

    public function delete(string $filename): void
    {
        $this->storage()->deleteDirectory(
            Path::dirname($filename)
        );
    }

    protected function download(string $directory): string
    {
        return $this->bot->store(
            $this->message->content->fileId,
            $directory,
            $this->message->content?->fileName
        );
    }

    protected function store(string $path): File
    {
        return $this->message->file()->create(compact('path'));
    }

    protected function directory(string $filename): string
    {
        return $this->storage()->path($filename);
    }

    protected function storage(): Filesystem
    {
        return Storage::disk(FileDisk::Temp->value);
    }

    protected function id(): string
    {
        return (string) $this->message->id;
    }
}
