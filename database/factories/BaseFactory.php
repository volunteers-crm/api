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

namespace Database\Factories;

use App\Enums\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

abstract class BaseFactory extends Factory
{
    protected array $statuses = [
        Status::NEW,
        Status::IN_PROGRESS,
        Status::DONE,
        Status::CLOSED,
    ];

    protected function status(): Status
    {
        return Arr::random($this->statuses);
    }

    protected function randomUser(): User
    {
        return User::inRandomOrder()->first();
    }
}
