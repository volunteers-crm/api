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
use App\Models\AppealChannel;
use App\Models\Bot;

class AppealChannelSeeder extends BaseSeeder
{
    public function run(): void
    {
        AppealChannel::withoutEvents(
            fn () => $this->appeals(
                fn (Bot $bot, Appeal $appeal) => $this->create($bot, $appeal)
            )
        );
    }

    protected function create(Bot $bot, Appeal $appeal): void
    {
        AppealChannel::factory(1, [
            'appeal_id'  => $appeal->id,
            'channel_id' => $bot->chats()->inRandomOrder()->first()->id,
        ])->create();
    }
}
