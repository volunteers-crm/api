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

use App\Models\Become;

class BecomeFactory extends BaseFactory
{
    protected $model = Become::class;

    public function definition(): array
    {
        return [
            'status' => $this->status(),

            'city' => $this->faker->city,

            'is_coordinator' => $this->faker->boolean,

            'about'  => $this->faker->realText,
            'source' => $this->faker->realText,

            'recommendations' => $this->faker->words(),
            'socials'         => $this->socials(),
        ];
    }

    protected function socials(): array
    {
        return [
            $this->faker->imageUrl,
            $this->faker->imageUrl,
            $this->faker->imageUrl,
        ];
    }
}
