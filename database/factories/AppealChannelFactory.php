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

namespace Database\Factories;

use App\Models\AppealChannel;

class AppealChannelFactory extends BaseFactory
{
    protected $model = AppealChannel::class;

    public function definition(): array
    {
        return [
            'message_id' => $this->faker->randomNumber(),
        ];
    }
}
