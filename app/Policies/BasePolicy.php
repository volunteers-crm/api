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

namespace App\Policies;

use App\Models\Appeal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Builder;

abstract class BasePolicy
{
    use HandlesAuthorization;

    protected function has(bool $has, ?string $message = null, ?int $code = 403): Response
    {
        return $has ? $this->allow() : $this->deny($message ?: __('http-statuses.403'), $code);
    }

    protected function byAppeal(User $user, Appeal $appeal): bool
    {
        return $appeal->whereHas(
            'bot',
            fn (Builder $builder) => $builder
                ->where('owner_id', $user->id)
                ->orWhereHas('users', fn (Builder $builder) => $builder->where('id', $user->id))
        )->exists();
    }
}
