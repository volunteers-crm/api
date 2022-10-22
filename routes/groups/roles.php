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

use App\Http\Controllers\Roles\RoleCategoriesController;
use App\Http\Controllers\Roles\RolesController;

app('router')->apiResource('roles/categories', RoleCategoriesController::class);
app('router')->apiResource('roles', RolesController::class);
