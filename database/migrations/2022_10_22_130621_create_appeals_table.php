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

use App\Models\Bot;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Bot::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class, 'client_id')->constrained('users')->cascadeOnUpdate();
            $table->foreignIdFor(User::class, 'curator_id')->constrained('users')->cascadeOnUpdate();

            $table->unsignedSmallInteger('status');

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
};
