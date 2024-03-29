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

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Socialite\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\Social;
use App\Services\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(LoginRequest $request, Social $social, User $users)
    {
        [$user, $token] = DB::transaction(function () use ($request, $social, $users) {
            $user  = $users->register($social, $request->dto());
            $token = $users->token($user, $social->type);

            return [$user, $token];
        });

        return UserResource::make($user)->additional(compact('token'));
    }

    public function me(Request $request)
    {
        return UserResource::make($request->user());
    }
}
