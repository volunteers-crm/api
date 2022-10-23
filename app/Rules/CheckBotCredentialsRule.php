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

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CheckBotCredentialsRule implements Rule
{
    protected string $url = 'https://api.telegram.org/bot';

    public function passes($attribute, $value): bool
    {
        return $this->request($value)->successful();
    }

    public function message(): string
    {
        return __('validation.credentials');
    }

    protected function request(string $token): Response
    {
        return Http::get($this->url($token));
    }

    protected function url(string $token): string
    {
        return $this->url . $token . '/getMe';
    }
}
