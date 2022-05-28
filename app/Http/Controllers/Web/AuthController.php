<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Socialite\ConfirmRequest;
use App\Models\Social;
use App\Services\Social\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $this->seo()
            ->title(__('Log In'))
            ->canonical($request->url());

        return view('login');
    }

    public function confirm(ConfirmRequest $request, Social $social, User $service)
    {
        $user = $service->register($social, $request->dto());

        Auth::login($user, true);

        $token = $user->createToken($social->type)->plainTextToken;

        $request->session()->regenerate();

        return redirect()->intended(route('admin.show'))->withCookie('token', $token);
    }
}
