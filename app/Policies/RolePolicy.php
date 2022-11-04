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

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy extends BasePolicy
{
    public function viewAny(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return true;
    }

    public function update(User $user, Role $role): Response
    {
        return $this->has(
            $role->owner_id === $user->id
        );
    }

    public function delete(User $user, Role $role): Response
    {
        return $this->has(
            $role->owner_id === $user->id
        );
    }
}
