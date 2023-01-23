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

use App\Models\Message;
use App\Objects\Messages\Text;
use DragonCode\Contracts\DataTransferObject\DataTransferObject;

class MessageFactory extends BaseFactory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->randomUser()->id,

            'content' => $this->content($this->faker->realText),

            'type' => 'text',
        ];
    }

    protected function content(string $text): DataTransferObject
    {
        return Text::make(compact('text'));
    }
}
