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

use App\Models\Bot as Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

class Bot
{
    public function allOwnedBots(User $user): Collection
    {
        return $user->ownedBots->loadMissing([
            'chats' => fn (Relation|Builder $builder) => $builder->public(),
        ]);
    }

    public function store(User $user, array $values): Model
    {
        return $user->ownedBots()->create($values);
    }

    public function update(User $user, Model $bot, array $values): Model
    {
        abort_if($user->ownedBots()->where('id', $bot->id)->doesntExist(), 403, __('http-statuses.403'));

        $bot->update($values);

        return $bot->loadMissing('chats');
    }

    public function destroy(User $user, Model $bot): void
    {
        abort_if($user->ownedBots()->where('id', $bot->id)->doesntExist(), 403, __('http-statuses.403'));

        $bot->delete();
    }
}
