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
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'appeal_id',
        'user_id',
        'message_id',
        'content',
        'type',
    ];

    protected $casts = [
        'appeal_id'  => 'int',
        'user_id'    => 'int',
        'message_id' => 'int',

        'content' => MessageCast::class,

        'type' => MessageType::class,
    ];

    protected $touches = [
        'appeal',
    ];

    public function appeal(): Relation
    {
        return $this->belongsTo(Appeal::class, 'appeal_id');
    }

    public function sender(): Relation
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
