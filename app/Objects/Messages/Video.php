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

use App\Data\Casts\Duration;
use App\Enums\MessageType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class Video extends BaseData
{
    public MessageType $dataType = MessageType::Video;

    #[WithCast(Duration::class)]
    public ?string $duration;

    public ?int $width;

    public ?int $height;

    public ?string $fileId;

    public ?string $fileUniqueId;

    public ?string $mimeType;
}
