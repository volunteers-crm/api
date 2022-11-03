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

namespace Database\Factories;

use App\Models\Channel;
use DefStudio\Telegraph\Database\Factories\TelegraphChatFactory;

class ChannelFactory extends TelegraphChatFactory
{
    protected $model = Channel::class;

    public function definition(): array
    {
        return [
            'chat_id' => $this->faker->unique()->randomNumber(),

            'name' => $this->faker->unique()->company,
        ];
    }
}
