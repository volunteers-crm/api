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

namespace App\Http\Resources\Dashboard;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * @mixin \App\Models\Role
 */
class DashboardRoleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->title,

            'users' => $this->users(),
        ];
    }

    protected function users(): Collection
    {
        return $this->users->map(
            fn (User $user) => [
                'name'  => $user->name,
                'count' => $user->count,
            ]
        );
    }
}
