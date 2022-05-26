<?php

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
