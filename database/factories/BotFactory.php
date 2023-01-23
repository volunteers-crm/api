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

use App\Models\Bot;
use DefStudio\Telegraph\Database\Factories\TelegraphBotFactory;
use Illuminate\Support\Arr;
use LaravelLang\Publisher\Constants\Locales;

class BotFactory extends TelegraphBotFactory
{
    protected $model = Bot::class;

    protected array $locales = [
        Locales::ENGLISH,
        Locales::GERMAN,
        Locales::RUSSIAN,
    ];

    public function definition(): array
    {
        return [
            'name'  => $this->faker->unique()->userName . '_bot',
            'title' => $this->faker->unique()->word,

            'token' => $this->faker->password,

            'timezone' => $this->faker->timezone,

            'locale' => $this->locale(),
        ];
    }

    protected function locale(): Locales
    {
        return Arr::random($this->locales);
    }
}
