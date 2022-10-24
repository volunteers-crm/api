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

namespace App\Helpers;

use App\Concerns\HasCache;
use App\Exceptions\Http\HasExpiredHttpException;
use App\Models\User;
use Illuminate\Support\Str;

class Hash
{
    use HasCache;

    protected int $ttl = 60;

    public function get(User $user): string
    {
        return $this->cache($user->id, $this->ttl)->put(
            Str::random(128)
        );
    }

    public function check(User $user, string $hash): void
    {
        $cache  = $this->cache($user->id);
        $stored = $cache->get();

        if (empty($stored) || $hash !== $stored) {
            throw new HasExpiredHttpException();
        }

        $cache->forget();
    }
}
