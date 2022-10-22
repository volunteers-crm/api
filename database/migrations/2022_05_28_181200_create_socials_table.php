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
        Schema::create('socials', static function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('type');
            $table->string('title');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['id', 'deleted_at']);
            $table->index(['type', 'deleted_at']);
            $table->index(['title', 'deleted_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('socials');
    }
};
