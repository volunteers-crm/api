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

namespace App\Services;

use App\Enums\File as Disk;
use App\Models\Bot as BotModel;
use App\Objects\Filesystem\File;
use DragonCode\Support\Facades\Helpers\Arr;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\MimeTypeDetection\FinfoMimeTypeDetector;
use League\MimeTypeDetection\GeneratedExtensionToMimeTypeMap;

class Downloader
{
    protected ?string $directory = null;

    protected Disk $disk = Disk::Private;

    protected array $extensions = GeneratedExtensionToMimeTypeMap::MIME_TYPES_FOR_EXTENSIONS;

    public function __construct(
        protected readonly FinfoMimeTypeDetector $detector
    ) {
    }

    public function get(BotModel $bot, string $fileId, string $filename): File
    {
        $fullPath = $this->download($bot, $fileId, $this->getPath(), $fileId);

        $path = $this->resolveRelativePath($fullPath);

        $filename .= $this->getExtension($fullPath);

        return File::from(compact('path', 'filename'));
    }

    protected function download(BotModel $bot, string $fileId, string $path, string $filename): string
    {
        return $bot->store($fileId, $path, $filename);
    }

    protected function getExtension(string $path): string
    {
        $extension = Arr::of($this->extensions)->flip()->get(
            $this->getMimeType($path)
        );

        return $extension ? '.' . $extension : '';
    }

    protected function getMimeType(string $path): string
    {
        return $this->detector->detectMimeTypeFromFile($path) ?: 'unknown';
    }

    protected function getPath(): string
    {
        return $this->storage()->path($this->getDirectory());
    }

    protected function getDirectory(): string
    {
        if ($this->directory) {
            return $this->directory;
        }

        return $this->directory = date('Y/m/d/H');
    }

    protected function storage(): Filesystem
    {
        return Storage::disk($this->disk->value);
    }

    protected function resolveRelativePath(string $fullPath): string
    {
        return Str::of(realpath($fullPath))
            ->after(realpath($this->storage()->path('')))
            ->ltrim('\\/')
            ->toString();
    }
}
