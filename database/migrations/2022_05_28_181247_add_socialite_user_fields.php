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

use App\Models\Social;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up()
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->after('id', static function (Blueprint $table) {
                $table->foreignIdFor(Social::class)->constrained()->cascadeOnDelete();

                $table->unsignedBigInteger('external_id');

                $table->string('username')->nullable();
                $table->string('avatar')->nullable();
            });
        });
    }
};
