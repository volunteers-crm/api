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

use App\Models\Channel as ChannelModel;
use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Channel
{
    public function allOwned(UserModel $user): Collection
    {
        return $this->ownedChannels($user)
            ->with('bot')
            ->public()
            ->get();
    }

    public function destroy(UserModel $user, ChannelModel $channel): void
    {
        $this->ownedChannels($user)
            ->where('id', $channel->id)
            ->delete();
    }

    protected function ownedChannels(UserModel $user): Builder|ChannelModel
    {
        return ChannelModel::query()
            ->withCount([
                'appeals as appeals_opened' => fn (Builder $builder) => $builder->opened(),
                'appeals as appeals_closed' => fn (Builder $builder) => $builder->closed(),
            ])
            ->whereHas(
                'bot',
                fn (Builder $builder) => $builder
                    ->where('owner_id', $user->id)
            );
    }
}
