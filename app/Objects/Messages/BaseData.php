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

use App\Enums\MessageType;
use DragonCode\Support\Facades\Helpers\Arr;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;

abstract class BaseData extends Data
{
    public MessageType $dataType;

    public ?int $messageId;

    #[MapOutputName('text')]
    public ?string $text;

    public function transform(
        bool $transformValues = true,
        WrapExecutionType $wrapExecutionType = WrapExecutionType::Disabled,
        bool $mapPropertyNames = true,
    ): array {
        return Arr::filter(
            parent::transform($transformValues, $wrapExecutionType, $mapPropertyNames),
            fn (mixed $value) => is_numeric($value) || is_bool($value) || ! empty($value)
        );
    }
}
