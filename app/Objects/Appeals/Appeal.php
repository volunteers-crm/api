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

namespace App\Objects\Appeals;

use Carbon\Carbon;
use DragonCode\SimpleDataTransferObject\DataTransferObject;
use DragonCode\Support\Facades\Helpers\Arr;

class Appeal extends DataTransferObject
{
    public ?string $address = null;

    public ?string $comment = null;

    public ?Carbon $date = null;

    public ?int $persons = 0;

    public array $channels = [];

    public array $todo = [];

    protected function castDate(string $value): ?Carbon
    {
        return Carbon::parse($value)->timezone('UTC');
    }

    protected function castTodo(array $values): array
    {
        return Arr::filter($values);
    }

    protected function castPersons(string|int $value): int
    {
        return (int) $value;
    }
}
