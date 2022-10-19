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

use App\Models\Social;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;

class ConfirmRequest extends FormRequest
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        return ! empty($this->dto());
    }

    public function dto(): ?User
    {
        return $this->driver()->user();
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
