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

use App\Models\Appeal;
use App\Models\Bot;
use App\Models\User;

class AppealSeeder extends BaseSeeder
{
    public function run(): void
    {
        Appeal::withoutEvents(
            fn () => $this->bots(
                fn (User $user, Bot $bot) => $this->create($bot)
            )
        );
    }

    protected function create(Bot $bot): void
    {
        Appeal::factory(5, [
            'bot_id' => $bot->id,
        ])->create();
    }
}
