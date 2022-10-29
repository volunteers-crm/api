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

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppealChannel extends Pivot
{
    protected $fillable = [
        'appeal_id',
        'channel_id',
        'message_id',
    ];

    protected $casts = [
        'appeal_id'  => 'int',
        'channel_id' => 'int',
        'message_id' => 'int',
    ];

    public function appeal(): Relation
    {
        return $this->belongsTo(Appeal::class, 'appeal_id');
    }

    public function chat(): Relation
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
}
