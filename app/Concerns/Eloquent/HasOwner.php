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

namespace App\Concerns\Eloquent;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait HasOwner
{
    public function scopeHasOwnerByBot(Builder $builder, User $user)
    {
        $builder->whereHas(
            'bot',
            fn (Builder $builder) => $builder
                ->where('owner_id', $user->id)
                ->orWhereHas('users', fn (Builder $builder) => $builder->where('id', $user->id))
        );
    }
}
