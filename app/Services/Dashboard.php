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
use App\Models\Appeal as AppealModel;
use App\Models\Role as RoleModel;
use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Dashboard
{
    public function appeals(UserModel $user): Collection
    {
        return AppealModel::query()
            ->whereHas(
                'bot',
                fn (Builder $builder) => $builder
                    ->where('owner_id', $user->id)
            )
            ->where('created_at', '>=', now()->subWeek()->startOfDay())
            ->groupBy('date')
            ->selectRaw('DATE_FORMAT(created_at, \'%Y-%m-%d\') as date')
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS unassigned', [Status::NEW])
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS solved', [Status::DONE])
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS cancelled', [Status::CLOSED])
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS opened', [Status::IN_PROGRESS])
            ->get();
    }

    public function coordinators(UserModel $user): Collection
    {
        return UserModel::query()
            ->whereHas(
                'ownedBots',
                fn (Builder $builder) => $builder
                    ->where('owner_id', $user->id)
            )
            ->withCount([
                'appeals as appeals_solved' => fn (Builder $builder) => $builder->where('status', Status::DONE),
                'appeals as appeals_cancelled' => fn (Builder $builder) => $builder->where('status', Status::CLOSED),
                'appeals as appeals_opened' => fn (Builder $builder) => $builder->where('status', Status::IN_PROGRESS),
            ])
            ->get();
    }

    public function roles(bool $onlyStorage = false): Collection
    {
        return RoleModel::query()
            ->withCount('users')
            ->when(
                $onlyStorage,
                fn (Builder $builder) => $builder
                    ->where('is_storage', true)
            )
            ->orderBy('title')
            ->get();
    }
}
