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

namespace App\Models;

use App\Casts\Filesystem\FilenameCast;
use App\Casts\Filesystem\PathCast;
use App\Enums\File as Disk;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = [
        'item_type',
        'item_id',

        'path',
        'filename',
    ];

    protected $casts = [
        'item_id' => 'int',

        'path'     => PathCast::class,
        'filename' => FilenameCast::class,
    ];

    protected Disk $disk = Disk::Private;

    public function storage(): Filesystem
    {
        return Storage::disk($this->disk->value);
    }

    public function fullPath(): Attribute
    {
        return new Attribute(
            get: fn () => $this->storage()->path($this->path)
        );
    }
}
