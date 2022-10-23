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

namespace App\Http\Requests\Bots;

use App\Rules\CheckBotCredentialsRule;
use App\Rules\LocaleRule;
use App\Rules\Users\ChannelOfUserRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'token' => ['required', 'string', 'regex:/^\d{8,10}:[a-zA-Z\d_-]{35}$/', 'unique:bots', new CheckBotCredentialsRule()],

            'channels'   => ['array'],
            'channels.*' => ['int', new ChannelOfUserRule($this->user())],

            'timezone' => ['required', 'string', 'timezone'],
            'locale'   => ['required', 'string', new LocaleRule()],
        ];
    }
}
