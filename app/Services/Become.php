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
use App\Models\Bot as BotModel;
use App\Models\Bot as Model;
use App\Models\User;
use App\Objects\Becomes\Become as BecomeDto;
use Illuminate\Database\Eloquent\Collection;

class Become
{
    public function index(User $user): Collection
    {
        return $user->becomes()
            ->wherePivot('status', Status::NEW)
            ->get();
    }

    public function search(BotModel $bot): BotModel
    {
        return $bot->loadMissing('roles');
    }

    public function store(User $user, Model $bot, BecomeDto $dto): Model
    {
        $user->roles()
            ->syncWithoutDetaching($dto->roles);

        $bot->becomes()
            ->syncWithPivotValues([$user->id], $dto->toArray(), false);

        return $user->becomes()
            ->wherePivot('bot_id', $bot->id)
            ->first();
    }

    public function cancel(User $user, BotModel $bot): void
    {
        $bot->becomes()->detach($user->id);
    }
}
