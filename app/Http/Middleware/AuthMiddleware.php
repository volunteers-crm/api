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

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Lmc\HttpConstants\Header;

class AuthMiddleware
{
    protected string $header = Header::AUTHORIZATION;

    public function handle(Request $request, Closure $next)
    {
        if ($token = $this->find($this->token($request))) {
            $this->login($token->tokenable);
            $this->touchLastUsed($token);

            return $next($request);
        }

        abort(401, __('http-statuses.401'));
    }

    protected function login(User $user): void
    {
        Auth::login($user);
    }

    protected function find(string $token): ?PersonalAccessToken
    {
        return PersonalAccessToken::findToken($token);
    }

    protected function touchLastUsed(PersonalAccessToken $token): void
    {
        $token->forceFill(['last_used_at' => now()])->save();
    }

    protected function token(Request $request): ?string
    {
        return $request->header($this->header);
    }
}
