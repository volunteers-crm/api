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
    public const ANIMATION = 'animation';

    public const AUDIO = 'audio';

    public const CONTACT = 'contact';

    public const DOCUMENT = 'document';

    public const LOCATION = 'location';

    public const PASSPORT = 'passport';

    public const STICKER = 'sticker';

    public const TEXT = 'text';

    public const VIDEO = 'video';

    public const VIDEO_NOTE = 'video_note';

    public const VOICE = 'voice';
}
