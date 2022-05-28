<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Services\Users;

use App\Models\User;
use Faker\Generator;

class Email
{
    public function __construct(
        protected Generator $faker = new Generator()
    ) {
    }

    public function generate(): string
    {
        do {
            $email = $this->faker->safeEmail;
        }
        while ($this->doesntUnique($email));

        return $email;
    }

    protected function doesntUnique(string $email): bool
    {
        return User::where(compact('email'))->exists();
    }
}
