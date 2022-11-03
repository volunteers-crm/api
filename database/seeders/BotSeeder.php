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
use App\Models\User;

class BotSeeder extends BaseSeeder
{
    public function run(): void
    {
        Bot::withoutEvents(
            fn () => $this->users(
                fn (User $user) => $this->create($user)
            )
        );
    }

    protected function create(User $user): void
    {
        Bot::factory(2, [
            'owner_id' => $user->id,
        ])->create();
    }
}
