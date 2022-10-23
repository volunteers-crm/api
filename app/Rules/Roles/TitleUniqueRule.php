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

namespace App\Rules\Roles;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class TitleUniqueRule implements Rule
{
    public function __construct(
        protected User $user,
        protected ?Role $ignoreRole = null
    ) {
    }

    public function passes($attribute, $value): bool
    {
        return $this->user->roles()
            ->when(
                $this->ignoreRole,
                fn (Builder $builder, Role $role) => $builder
                    ->where('id', '<>', $role->id)
            )
            ->where('title', $value)
            ->doesntExist();
    }

    public function message(): string
    {
        return __('validation.unique');
    }
}
