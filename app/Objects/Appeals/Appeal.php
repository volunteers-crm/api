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

namespace App\Objects\Appeals;

use App\Data\Casts\Date;
use App\Data\Casts\Persons;
use App\Data\Casts\Todo;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Appeal extends Data
{
    public ?string $address = null;

    public ?string $comment = null;

    #[WithCast(Date::class)]
    public ?Carbon $date = null;

    #[WithCast(Persons::class)]
    public ?int $persons = 0;

    public array $channels = [];

    #[WithCast(Todo::class)]
    public array $todo = [];
}
