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

namespace App\Observers;

use App\Models\Page;
use LaravelLang\Publisher\Constants\Locales;

class PageObserver
{
    protected Locales $locale = Locales::ENGLISH;

    public function saving(Page $page): void
    {
        $page->slug = $page->getTranslation('name', $this->locale->value);
    }
}
