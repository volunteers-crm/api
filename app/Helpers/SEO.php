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

namespace App\Helpers;

use Artesaos\SEOTools\Traits\SEOTools;
use DragonCode\Support\Concerns\Makeable;
use Psr\Http\Message\UriInterface;

class SEO
{
    use Makeable;
    use SEOTools;

    public function title(string $title): self
    {
        $this->seo()->setTitle($title);

        return $this;
    }

    public function description(string $description): self
    {
        $this->seo()->setDescription($description);

        return $this;
    }

    public function canonical(UriInterface|string $url): self
    {
        $this->seo()->setCanonical((string) $url);

        $this->seo()->opengraph()->setUrl((string) $url);
        $this->seo()->jsonLd()->setUrl((string) $url);
        $this->seo()->twitter()->setUrl((string) $url);

        return $this;
    }
}
