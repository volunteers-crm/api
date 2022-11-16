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

use App\Data\Casts\Translatable;
use App\Enums\MessageType;
use Spatie\LaravelData\Attributes\WithCast;

class Unsupported extends BaseData
{
    public MessageType $dataType = MessageType::Unsupported;

    #[WithCast(Translatable::class)]
    public string $message = 'http-statuses.415';

    public ?array $data;
}
