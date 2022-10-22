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

namespace App\Models;

use App\Casts\MessageCast;
use App\Enums\MessageType;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_id',
        'content',
        'type',
        'position',
    ];

    protected $casts = [
        'page_id'  => 'int',
        'position' => 'int',

        'content' => MessageCast::class,

        'type' => MessageType::class,
    ];
}
