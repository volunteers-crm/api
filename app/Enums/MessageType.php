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

namespace App\Enums;

enum MessageType: string
{
    case Animation = 'animation';

    case Audio = 'audio';

    case Contact = 'contact';

    case Document = 'document';

    case Location = 'location';

    case Passport = 'passport';

    case Photo = 'photo';

    case Sticker = 'sticker';

    case Text = 'text';

    case Video = 'video';

    case VideoNote = 'video_note';

    case Voice = 'voice';

    case Unsupported = 'unsupported';
}
