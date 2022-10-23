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

enum MessageType: string
{
    case ANIMATION = 'animation';

    case AUDIO = 'audio';

    case CONTACT = 'contact';

    case DOCUMENT = 'document';

    case LOCATION = 'location';

    case PASSPORT = 'passport';

    case STICKER = 'sticker';

    case TEXT = 'text';

    case VIDEO = 'video';

    case VIDEO_NOTE = 'video_note';

    case VOICE = 'voice';
}
