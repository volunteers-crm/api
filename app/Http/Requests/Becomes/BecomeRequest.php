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

namespace App\Http\Requests\Becomes;

use App\Objects\Becomes\Become;
use Illuminate\Foundation\Http\FormRequest;

class BecomeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'city' => ['required', 'string', 'min:1', 'max:255'],

            'roles'   => ['sometimes', 'array'],
            'roles.*' => ['required', 'int', 'exists:roles,id'],

            'is_coordinator' => ['required', 'boolean'],

            'about'  => ['required', 'string', 'min:3', 'max:3000'],
            'source' => ['required', 'string', 'min:3', 'max:3000'],

            'recommendations'   => ['sometimes', 'array'],
            'recommendations.*' => ['nullable', 'string'],

            'socials'   => ['sometimes', 'array'],
            'socials.*' => ['nullable', 'string', 'url'],
        ];
    }

    public function dto(): Become
    {
        return Become::from($this);
    }
}
