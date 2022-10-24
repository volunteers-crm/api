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

use App\Concerns\HasCache;
use App\Helpers\Hash;
use App\Models\Channel as ChannelModel;
use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Collection;

class Channel
{
    use HasCache;

    public function __construct(
        protected Hash $hash
    ) {
    }

    public function allOwned(UserModel $user): Collection
    {
        return $user->ownedChannels->loadMissing('bots');
    }

    public function getRegistrationCommand(UserModel $user): string
    {
        return sprintf('/connect@%s %s', $this->getBotUsername(), $this->getHash($user));
    }

    public function destroy(UserModel $user, ChannelModel $channel): void
    {
        $user->ownedChannels()->where('id', $channel->id)->delete();
    }

    protected function getHash(UserModel $user): string
    {
        return $this->hash->get($user);
    }

    protected function getBotUsername(): string
    {
        return config('services.telegram.bot');
    }
}
