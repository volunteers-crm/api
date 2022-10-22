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

return new class extends Migration
{
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->uuid('id')->change();
            $table->uuid('user_id')->change();
            $table->uuid('role_category_id')->change();
        });
    }

    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->id()->change();
            $table->unsignedBigInteger('user_id')->change();
            $table->unsignedBigInteger('role_category_id')->change();
        });
    }
};
