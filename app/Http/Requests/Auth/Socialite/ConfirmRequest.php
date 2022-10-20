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

namespace App\Http\Requests\Auth\Socialite;

use App\Exceptions\Http\InvalidUserDataHttpException;
use App\Models\Social;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use InvalidArgumentException;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class ConfirmRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id'        => ['required', 'numeric'],
            'hash'      => ['required', 'string'],
            'auth_date' => ['required', 'numeric'],

            'username'   => ['sometimes', 'string'],
            'first_name' => ['required', 'string'],
            'last_name'  => ['required', 'string'],

            'photo_url' => ['required', 'string', 'url'],
        ];
    }

    public function authorize(): bool
    {
        return ! empty($this->dto());
    }

    public function dto(): User
    {
        try {
            return $this->driver()->user();
        }
        catch (InvalidArgumentException) {
            throw new InvalidUserDataHttpException();
        }
    }

    public function provider(): Route|Social|string
    {
        return $this->route('social');
    }

    protected function driver(): Provider
    {
        return Socialite::driver($this->provider()->type);
    }
}
