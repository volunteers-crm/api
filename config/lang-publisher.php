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

return [
    /*
     * Determines what type of files to use when updating language files.
     *
     * `true` means inline files will be used.
     * `false` means that default files will be used.
     *
     * The difference between them can be seen here:
     * @see https://github.com/Laravel-Lang/lang/blob/master/source/validation.php
     * @see https://github.com/Laravel-Lang/lang/blob/master/source/validation-inline.php
     *
     * By default, `true`.
     */

    'inline' => false,

    /*
     * Do arrays need to be aligned by keys before processing arrays?
     *
     * By default, true
     */

    'align' => true,
];
