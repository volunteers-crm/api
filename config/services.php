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

use App\Enums\Social;

return [
    Social::TELEGRAM() => [
        'bot' => env('TELEGRAM_BOT_USERNAME'),

        'client_id'     => null,
        'client_secret' => env('TELEGRAM_BOT_TOKEN'),

        'redirect' => '/auth/telegram/confirm',
    ],
];
