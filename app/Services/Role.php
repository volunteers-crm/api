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

namespace App\Services;

use App\Models\Role as Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class Role
{
    public function index(User $user): Collection
    {
        return $user->ownedRoles;
    }

    public function store(User $user, array $values): Model
    {
        return $user->ownedRoles()->create($values);
    }

    public function update(Model $role, array $values): Model
    {
        $role->update($values);

        return $role;
    }

    public function destroy(Model $role): void
    {
        $role->delete();
    }
}
