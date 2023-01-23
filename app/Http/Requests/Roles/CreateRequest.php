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

namespace App\Http\Requests\Roles;

use App\Rules\Roles\TitleUniqueRule;

class CreateRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'title'      => ['required', 'string', 'min:2', 'max:255', new TitleUniqueRule($this->user())],
            'is_storage' => ['required', 'boolean'],
        ];
    }
}
