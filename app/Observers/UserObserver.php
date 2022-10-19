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

namespace App\Observers;

use App\Models\User;
use App\Services\Users\Email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserObserver
{
    public function __construct(
        protected Email $email
    ) {
    }

    public function creating(User $user): void
    {
        $this->setPassword($user);
        $this->setEmail($user);
    }

    protected function setPassword(User $user): void
    {
        if (! $user->password) {
            $user->password = Hash::make(Str::random());
        }
    }

    protected function setEmail(User $user): void
    {
        if (! $user->email) {
            $user->email = $this->email->generate();

            $user->email_verified_at = $user->freshTimestamp();
        }
    }
}
