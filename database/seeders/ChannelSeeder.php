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

namespace Database\Seeders;

use App\Models\Bot;
use App\Models\Channel;
use App\Models\User;

class ChannelSeeder extends BaseSeeder
{
    public function run(): void
    {
        Channel::withoutEvents(
            fn () => $this->bots(
                fn (User $user, Bot $bot) => $this->create($user, $bot)
            )
        );
    }

    protected function create(User $user, Bot $bot): void
    {
        Channel::factory(3, [
            'telegraph_bot_id' => $bot->id,
        ])->create();
    }
}
