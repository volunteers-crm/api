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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::table('user_bot', function (Blueprint $table) {
            $table->boolean('accepted')->default(false);

            $table->string('city');

            $table->boolean('is_coordinator')->default(false);

            $table->text('about');
            $table->text('source');

            $table->json('recommendations')->nullable();
            $table->json('socials')->nullable();
        });
    }
};
