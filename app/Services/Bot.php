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

use App\Models\Bot as Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;

class Bot
{
    public function allOwnedBots(User $user): Collection
    {
        return $this->loadMissing($user->ownedBots);
    }

    public function store(User $user, array $values, ?array $roles): Model
    {
        $bot = $user->ownedBots()->create($values);

        $user->bots()->syncWithoutDetaching($bot->id);
        $bot->roles()->syncWithoutDetaching($roles);

        return $this->loadMissing($bot);
    }

    public function update(Model $bot, array $values, ?array $roles): Model
    {
        $bot->update($values);

        $bot->roles()->sync($roles);

        return $this->loadMissing($bot);
    }

    public function destroy(Model $bot): void
    {
        $bot->delete();
    }

    protected function loadMissing(Collection|Model $bot): Collection|Model
    {
        return $bot->loadMissing([
            'chats' => fn (Builder|Relation $builder) => $builder->public(),
            'roles',
        ])
            ->loadCount([
                'appeals as appeals_opened' => fn (Builder $builder) => $builder->opened(),
                'appeals as appeals_closed' => fn (Builder $builder) => $builder->closed(),
            ]);
    }
}
