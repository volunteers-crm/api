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

return [
    'telegram' => [
        'bot'           => env('TELEGRAM_BOT_NAME'),
        'client_id'     => null,
        'client_secret' => env('TELEGRAM_TOKEN'),
        'redirect'      => env('TELEGRAM_REDIRECT_URI'),
    ],
];
