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

namespace Database\Seeders;

use App\Models\Become;
use App\Models\Bot;
use App\Models\User;

class BecomeSeeder extends BaseSeeder
{
    public function run(): void
    {
        Become::withoutEvents(
            fn () => $this->bots(
                fn (User $user, Bot $bot) => $this->create($user, $bot)
            )
        );
    }

    protected function create(User $user, Bot $bot): void
    {
        Become::factory(state: [
            'user_id' => $user->id,
            'bot_id'  => $bot->id,
        ])
            ->forUser(['id' => $user->id])
            ->forBot(['id' => $bot->id])
            ->create();
    }
}
