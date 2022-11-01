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

namespace App\Services;

use App\Enums\Status;
use App\Models\Become;
use App\Models\Become as BecomeModel;
use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Becomes
{
    public function index(UserModel $user, Status $status): Collection
    {
        return BecomeModel::query()
            ->with(['bot', 'user.roles'])
            ->whereHas(
                'bot',
                fn (Builder $builder) => $builder
                    ->where('owner_id', $user->id)
            )
            ->where(compact('status'))
            ->oldest()
            ->get();
    }

    public function changeStatus(Become $become, Status $status): void
    {
        $become->update(compact('status'));
    }
}
