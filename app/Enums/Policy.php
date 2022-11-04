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

namespace App\Enums;

use ArchTech\Enums\InvokableCases;

/**
 * @method static string CONFIRM()
 * @method static string CREATE()
 * @method static string DELETE()
 * @method static string INDEX()
 * @method static string SHOW()
 * @method static string UPDATE()
 */
enum Policy: string
{
    use InvokableCases;

    case INDEX = 'index';

    case SHOW = 'show';

    case CREATE = 'create';

    case UPDATE = 'update';

    case DELETE = 'delete';

    case CONFIRM = 'confirm';
}
