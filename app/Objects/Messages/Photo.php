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

namespace App\Objects\Messages;

use App\Enums\MessageType;
use Spatie\LaravelData\Attributes\MapInputName;

class Photo extends BaseData
{
    public MessageType $dataType = MessageType::Photo;

    #[MapInputName('file_id')]
    public ?string $fileId;

    #[MapInputName('file_unique_id')]
    public ?string $fileUniqueId;
}
