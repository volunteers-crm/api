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
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS unassigned', [Status::New])
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS solved', [Status::Done])
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS cancelled', [Status::Closed])
            ->selectRaw('SUM( IF(`status` = ?, 1, 0) ) AS opened', [Status::InProgress])
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
                'appeals as appeals_solved'    => fn (Builder $builder) => $builder->where('status', Status::Done),
                'appeals as appeals_cancelled' => fn (Builder $builder) => $builder->where('status', Status::Closed),
                'appeals as appeals_opened'    => fn (Builder $builder) => $builder->where('status', Status::InProgress),
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
