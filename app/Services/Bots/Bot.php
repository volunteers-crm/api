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

namespace App\Services\Bots;

use App\Models\Bot as Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class Bot
{
    public function allOwnedBots(User $user): Collection
    {
        return $user->ownedBots;
    }

    public function store(User $user, array $values, ?array $channels = null): Model
    {
        $bot = $user->ownedBots()->create($values);

        if (is_array($channels) && $channels) {
            $bot->channels()->sync($channels, false);
        }

        return $bot->loadMissing('channels');
    }

    public function update(Model $bot, array $values, ?array $channels = null): Model
    {
        $bot->update($values);

        $bot->channels()->sync($channels);

        $bot->refresh();

        return $bot;
    }

    public function destroy(Model $bot): void
    {
        $bot->delete();
    }
}
