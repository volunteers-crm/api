<?php

/*
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

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\SEO;
use DragonCode\WebCore\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected function seo(): SEO
    {
        return SEO::make();
    }
}
