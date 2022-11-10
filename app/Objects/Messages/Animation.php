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

namespace App\Objects\Messages;

use DragonCode\SimpleDataTransferObject\DataTransferObject;

class Animation extends DataTransferObject
{
    public ?string $mimeType;

    public ?int $width;

    public ?int $height;

    public ?string $fileId;

    public ?string $fileUniqueId;

    public ?int $fileSize;

    protected $map = [
        'mime_type'      => 'mimeType',
        'file_id'        => 'fileId',
        'file_unique_id' => 'fileUniqueId',
        'file_size'      => 'fileSize',
    ];
}
