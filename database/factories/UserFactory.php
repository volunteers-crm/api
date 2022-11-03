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

use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserFactory extends BaseFactory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'social_id'   => $this->social()->id,
            'external_id' => $this->faker->unique()->randomNumber(),

            'username' => $this->faker->unique()->userName,
            'name'     => $this->faker->firstName,
            'password' => $this->password(),

            'avatar' => $this->faker->imageUrl(256, 256),
        ];
    }

    protected function social(): Social
    {
        return Social::first();
    }

    protected function password(): string
    {
        return Hash::make($this->faker->password);
    }
}
