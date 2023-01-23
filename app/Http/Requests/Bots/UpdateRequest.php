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

namespace App\Http\Requests\Bots;

use App\Rules\LocaleRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'timezone' => ['required', 'string', 'timezone'],
            'locale'   => ['required', 'string', new LocaleRule()],

            'roles'   => ['sometimes', 'array'],
            'roles.*' => ['required', 'int', 'exists:roles,id'],
        ];
    }
}
