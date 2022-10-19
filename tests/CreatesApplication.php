<?php
/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

namespace Tests;

use DragonCode\LaravelRouteNames\Application;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../vendor/dragon-code/web-core/bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
