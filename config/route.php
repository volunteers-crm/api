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

return [
    /*
    |--------------------------------------------------------------------------
    | Names
    |--------------------------------------------------------------------------
    |
    | This option determines the handling of route names.
    |
    */

    'names' => [
        /*
        |--------------------------------------------------------------------------
        | Exclude Names
        |--------------------------------------------------------------------------
        |
        | This option specifies the names of the routes that will be excluded
        | from the conversion.
        |
        */

        'exclude' => [
            '__clockwork*',
            '_debugbar*',
            '_ignition*',
            'horizon*',
            'pretty-routes*',
            'sanctum*',
            'telescope*',
            'telegraph.webhook',
        ],
    ],
];
