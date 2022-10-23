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

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Socialite\ConfirmRequest;
use App\Http\Resources\Users\UserResource;
use App\Models\Social;
use App\Services\Users\Registrator;

class AuthController extends Controller
{
    public function __invoke(ConfirmRequest $request, Social $social, Registrator $users)
    {
        $user  = $users->register($social, $request->dto());
        $token = $users->token($user, $social->type);

        return UserResource::make($user)->additional(compact('token'));
    }
}
