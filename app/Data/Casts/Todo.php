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

namespace App\Data\Casts;

use DragonCode\Support\Facades\Helpers\Arr;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class Todo implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): array
    {
        return Arr::of($value)->filter()->unique()->values()->toArray();
    }
}
