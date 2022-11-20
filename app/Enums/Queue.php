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
 * @method static string Appeals()
 * @method static string Messages()
 * @method static string Webhooks()
 * @method static string Files()
 */
enum Queue: string
{
    use InvokableCases;

    case Appeals = 'appeals';

    case Messages = 'messages';

    case Webhooks = 'webhooks';

    case Files = 'files';
}
